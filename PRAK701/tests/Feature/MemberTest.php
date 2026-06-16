<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_guest_cannot_access_member_routes(): void
    {
        $this->get('/member')->assertRedirect('/login');
        $this->get('/member/create')->assertRedirect('/login');
        $this->post('/member', [])->assertRedirect('/login');
        
        $member = Member::factory()->create([
            'tgl_terakhir_bayar' => '2026-06-16'
        ]);
        $this->get("/member/{$member->id}")->assertRedirect('/login');
        $this->get("/member/{$member->id}/edit")->assertRedirect('/login');
        $this->put("/member/{$member->id}", [])->assertRedirect('/login');
        $this->delete("/member/{$member->id}")->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_member_index(): void
    {
        Member::factory()->count(3)->create([
            'tgl_terakhir_bayar' => '2026-06-16'
        ]);

        $response = $this->actingAs($this->user)->get('/member');

        $response->assertStatus(200);
        $response->assertViewIs('member.index');
        $response->assertViewHas('daftarMember');
    }

    public function test_authenticated_user_can_view_create_member_form(): void
    {
        $response = $this->actingAs($this->user)->get('/member/create');

        $response->assertStatus(200);
        $response->assertViewIs('member.create');
    }

    public function test_store_member_validation(): void
    {
        $response = $this->actingAs($this->user)->post('/member', [
            'nama_member' => '',
            'nomor_member' => '',
            'alamat' => '',
            'tgl_mendaftar' => '',
            'tgl_terakhir_bayar' => '',
        ]);

        $response->assertSessionHasErrors([
            'nama_member',
            'nomor_member',
            'alamat',
            'tgl_mendaftar',
            'tgl_terakhir_bayar',
        ]);
        
        // Test custom messages in Indonesian
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Nama member wajib diisi.', $errors->first('nama_member'));
        $this->assertEquals('Nomor member wajib diisi.', $errors->first('nomor_member'));
        $this->assertEquals('Alamat wajib diisi.', $errors->first('alamat'));
        $this->assertEquals('Tanggal mendaftar wajib diisi.', $errors->first('tgl_mendaftar'));
        $this->assertEquals('Tanggal terakhir bayar wajib diisi.', $errors->first('tgl_terakhir_bayar'));
    }

    public function test_store_member_validation_bounds(): void
    {
        $response = $this->actingAs($this->user)->post('/member', [
            'nama_member' => str_repeat('a', 251),
            'nomor_member' => str_repeat('b', 16),
            'alamat' => 'Valid Alamat',
            'tgl_mendaftar' => '2026-06-16',
            'tgl_terakhir_bayar' => '2026-06-16',
        ]);

        $response->assertSessionHasErrors(['nama_member', 'nomor_member']);
        
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Nama member maksimal 250 karakter.', $errors->first('nama_member'));
        $this->assertEquals('Nomor member maksimal 15 karakter.', $errors->first('nomor_member'));
    }

    public function test_store_member_unique_validation(): void
    {
        Member::factory()->create([
            'nomor_member' => 'MBR-0001',
            'tgl_terakhir_bayar' => '2026-06-16',
        ]);

        $response = $this->actingAs($this->user)->post('/member', [
            'nama_member' => 'New Member',
            'nomor_member' => 'MBR-0001',
            'alamat' => 'Alamat New',
            'tgl_mendaftar' => '2026-06-16',
            'tgl_terakhir_bayar' => '2026-06-16',
        ]);

        $response->assertSessionHasErrors(['nomor_member']);
        
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Nomor member sudah terdaftar.', $errors->first('nomor_member'));
    }

    public function test_store_member_success(): void
    {
        $data = [
            'nama_member' => 'Budi Santoso',
            'nomor_member' => 'MBR-0002',
            'alamat' => 'Jl. Merdeka No. 10',
            'tgl_mendaftar' => '2026-06-01',
            'tgl_terakhir_bayar' => '2026-06-15',
        ];

        $response = $this->actingAs($this->user)->post('/member', $data);

        $response->assertRedirect('/member');
        $response->assertSessionHas('success', 'Data berhasil ditambahkan.');
        $this->assertDatabaseHas('members', $data);
    }

    public function test_authenticated_user_can_view_member_detail(): void
    {
        $member = Member::factory()->create([
            'tgl_terakhir_bayar' => '2026-06-16'
        ]);

        $response = $this->actingAs($this->user)->get("/member/{$member->id}");

        $response->assertStatus(200);
        $response->assertViewIs('member.show');
        $response->assertViewHas('member');
    }

    public function test_authenticated_user_can_view_edit_member_form(): void
    {
        $member = Member::factory()->create([
            'tgl_terakhir_bayar' => '2026-06-16'
        ]);

        $response = $this->actingAs($this->user)->get("/member/{$member->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('member.edit');
        $response->assertViewHas('member');
    }

    public function test_update_member_success(): void
    {
        $member = Member::factory()->create([
            'nama_member' => 'Old Name',
            'nomor_member' => 'MBR-9999',
            'alamat' => 'Old Address',
            'tgl_mendaftar' => '2026-01-01',
            'tgl_terakhir_bayar' => '2026-01-02',
        ]);

        $data = [
            'nama_member' => 'New Name',
            'nomor_member' => 'MBR-9999', // keeping the same to test unique validation ignore current id
            'alamat' => 'New Address',
            'tgl_mendaftar' => '2026-02-01',
            'tgl_terakhir_bayar' => '2026-02-02',
        ];

        $response = $this->actingAs($this->user)->put("/member/{$member->id}", $data);

        $response->assertRedirect('/member');
        $response->assertSessionHas('success', 'Data berhasil diubah.');
        $this->assertDatabaseHas('members', array_merge(['id' => $member->id], $data));
    }

    public function test_destroy_member_success(): void
    {
        $member = Member::factory()->create([
            'tgl_terakhir_bayar' => '2026-06-16'
        ]);

        $response = $this->actingAs($this->user)->delete("/member/{$member->id}");

        $response->assertRedirect('/member');
        $response->assertSessionHas('success', 'Data berhasil dihapus.');
        $this->assertDatabaseMissing('members', ['id' => $member->id]);
    }
}
