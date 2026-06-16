<?php

namespace Tests\Feature;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PeminjamanTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Member $member;
    private Buku $buku;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->member = Member::factory()->create(['tgl_terakhir_bayar' => '2026-06-16']);
        $this->buku = Buku::factory()->create();
    }

    public function test_guest_cannot_access_peminjaman_routes(): void
    {
        $this->get('/peminjaman')->assertRedirect('/login');
        $this->get('/peminjaman/create')->assertRedirect('/login');
        $this->post('/peminjaman', [])->assertRedirect('/login');
        
        $peminjaman = Peminjaman::factory()->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
        ]);
        
        $this->get("/peminjaman/{$peminjaman->id}")->assertRedirect('/login');
        $this->get("/peminjaman/{$peminjaman->id}/edit")->assertRedirect('/login');
        $this->put("/peminjaman/{$peminjaman->id}", [])->assertRedirect('/login');
        $this->delete("/peminjaman/{$peminjaman->id}")->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_peminjaman_index(): void
    {
        Peminjaman::factory()->count(2)->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
        ]);

        $response = $this->actingAs($this->user)->get('/peminjaman');

        $response->assertStatus(200);
        $response->assertViewIs('peminjaman.index');
        $response->assertViewHas('daftarPeminjaman');
    }

    public function test_authenticated_user_can_view_create_peminjaman_form(): void
    {
        $response = $this->actingAs($this->user)->get('/peminjaman/create');

        $response->assertStatus(200);
        $response->assertViewIs('peminjaman.create');
        $response->assertViewHas('daftarMember');
        $response->assertViewHas('daftarBuku');
    }

    public function test_store_peminjaman_validation(): void
    {
        $response = $this->actingAs($this->user)->post('/peminjaman', [
            'member_id' => '',
            'buku_id' => '',
            'tgl_pinjam' => '',
            'tgl_kembali' => '',
            'status' => '',
        ]);

        $response->assertSessionHasErrors(['member_id', 'buku_id', 'tgl_pinjam', 'status']);
        
        // Test custom messages
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Member wajib dipilih.', $errors->first('member_id'));
        $this->assertEquals('Buku wajib dipilih.', $errors->first('buku_id'));
        $this->assertEquals('Tanggal pinjam wajib diisi.', $errors->first('tgl_pinjam'));
        $this->assertEquals('Status wajib dipilih.', $errors->first('status'));
    }

    public function test_store_peminjaman_validation_invalid_references_and_status(): void
    {
        $response = $this->actingAs($this->user)->post('/peminjaman', [
            'member_id' => 99999,
            'buku_id' => 99999,
            'tgl_pinjam' => '2026-06-16',
            'tgl_kembali' => '2026-06-15', // tgl_kembali is before tgl_pinjam
            'status' => 'invalid-status',
        ]);

        $response->assertSessionHasErrors(['member_id', 'buku_id', 'tgl_kembali', 'status']);
        
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Member yang dipilih tidak valid.', $errors->first('member_id'));
        $this->assertEquals('Buku yang dipilih tidak valid.', $errors->first('buku_id'));
        $this->assertEquals('Tanggal kembali harus sama dengan atau setelah tanggal pinjam.', $errors->first('tgl_kembali'));
        $this->assertEquals('Status yang dipilih tidak valid.', $errors->first('status'));
    }

    public function test_store_peminjaman_success(): void
    {
        $data = [
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
            'tgl_pinjam' => '2026-06-01',
            'tgl_kembali' => '2026-06-10',
            'status' => 'dikembalikan',
        ];

        $response = $this->actingAs($this->user)->post('/peminjaman', $data);

        $response->assertRedirect('/peminjaman');
        $response->assertSessionHas('success', 'Data berhasil ditambahkan.');
        $this->assertDatabaseHas('peminjamans', $data);
    }

    public function test_authenticated_user_can_view_peminjaman_detail(): void
    {
        $peminjaman = Peminjaman::factory()->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
        ]);

        $response = $this->actingAs($this->user)->get("/peminjaman/{$peminjaman->id}");

        $response->assertStatus(200);
        $response->assertViewIs('peminjaman.show');
        $response->assertViewHas('peminjaman');
    }

    public function test_authenticated_user_can_view_edit_peminjaman_form(): void
    {
        $peminjaman = Peminjaman::factory()->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
        ]);

        $response = $this->actingAs($this->user)->get("/peminjaman/{$peminjaman->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('peminjaman.edit');
        $response->assertViewHas('peminjaman');
        $response->assertViewHas('daftarMember');
        $response->assertViewHas('daftarBuku');
    }

    public function test_update_peminjaman_success(): void
    {
        $peminjaman = Peminjaman::factory()->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
            'tgl_pinjam' => '2026-06-01',
            'tgl_kembali' => null,
            'status' => 'dipinjam',
        ]);

        $data = [
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
            'tgl_pinjam' => '2026-06-01',
            'tgl_kembali' => '2026-06-16',
            'status' => 'dikembalikan',
        ];

        $response = $this->actingAs($this->user)->put("/peminjaman/{$peminjaman->id}", $data);

        $response->assertRedirect('/peminjaman');
        $response->assertSessionHas('success', 'Data berhasil diubah.');
        $this->assertDatabaseHas('peminjamans', array_merge(['id' => $peminjaman->id], $data));
    }

    public function test_destroy_peminjaman_success(): void
    {
        $peminjaman = Peminjaman::factory()->create([
            'member_id' => $this->member->id,
            'buku_id' => $this->buku->id,
        ]);

        $response = $this->actingAs($this->user)->delete("/peminjaman/{$peminjaman->id}");

        $response->assertRedirect('/peminjaman');
        $response->assertSessionHas('success', 'Data berhasil dihapus.');
        $this->assertDatabaseMissing('peminjamans', ['id' => $peminjaman->id]);
    }
}
