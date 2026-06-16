<?php

namespace Tests\Feature;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BukuTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_guest_cannot_access_buku_routes(): void
    {
        $this->get('/buku')->assertRedirect('/login');
        $this->get('/buku/create')->assertRedirect('/login');
        $this->post('/buku', [])->assertRedirect('/login');
        
        $buku = Buku::factory()->create();
        $this->get("/buku/{$buku->id}")->assertRedirect('/login');
        $this->get("/buku/{$buku->id}/edit")->assertRedirect('/login');
        $this->put("/buku/{$buku->id}", [])->assertRedirect('/login');
        $this->delete("/buku/{$buku->id}")->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_buku_index(): void
    {
        Buku::factory()->count(3)->create();

        $response = $this->actingAs($this->user)->get('/buku');

        $response->assertStatus(200);
        $response->assertViewIs('buku.index');
        $response->assertViewHas('daftarBuku');
    }

    public function test_authenticated_user_can_view_create_buku_form(): void
    {
        $response = $this->actingAs($this->user)->get('/buku/create');

        $response->assertStatus(200);
        $response->assertViewIs('buku.create');
    }

    public function test_store_buku_validation(): void
    {
        $response = $this->actingAs($this->user)->post('/buku', [
            'judul_buku' => '',
            'penulis' => '',
            'penerbit' => '',
            'tahun_terbit' => '',
        ]);

        $response->assertSessionHasErrors(['judul_buku', 'penulis', 'penerbit', 'tahun_terbit']);
        
        // Test custom messages
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Judul buku wajib diisi.', $errors->first('judul_buku'));
        $this->assertEquals('Penulis wajib diisi.', $errors->first('penulis'));
        $this->assertEquals('Penerbit wajib diisi.', $errors->first('penerbit'));
        $this->assertEquals('Tahun terbit wajib diisi.', $errors->first('tahun_terbit'));
    }

    public function test_store_buku_validation_bounds(): void
    {
        $response = $this->actingAs($this->user)->post('/buku', [
            'judul_buku' => str_repeat('a', 501),
            'penulis' => str_repeat('b', 501),
            'penerbit' => str_repeat('c', 251),
            'tahun_terbit' => 1800, // must be gt:1800
        ]);

        $response->assertSessionHasErrors(['judul_buku', 'penulis', 'penerbit', 'tahun_terbit']);
        
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Judul buku maksimal 500 karakter.', $errors->first('judul_buku'));
        $this->assertEquals('Penulis maksimal 500 karakter.', $errors->first('penulis'));
        $this->assertEquals('Penerbit maksimal 250 karakter.', $errors->first('penerbit'));
        $this->assertEquals('Tahun terbit harus lebih besar dari 1800.', $errors->first('tahun_terbit'));

        // Test upper bound
        $response = $this->actingAs($this->user)->post('/buku', [
            'judul_buku' => 'Valid Title',
            'penulis' => 'Valid Author',
            'penerbit' => 'Valid Publisher',
            'tahun_terbit' => 2024, // must be lt:2024
        ]);

        $response->assertSessionHasErrors(['tahun_terbit']);
        $errors = session('errors')->getBag('default');
        $this->assertEquals('Tahun terbit harus lebih kecil dari 2024.', $errors->first('tahun_terbit'));
    }

    public function test_store_buku_success(): void
    {
        $data = [
            'judul_buku' => 'Belajar Laravel',
            'penulis' => 'Taylor Otwell',
            'penerbit' => 'Laravel Media',
            'tahun_terbit' => 2023,
        ];

        $response = $this->actingAs($this->user)->post('/buku', $data);

        $response->assertRedirect('/buku');
        $response->assertSessionHas('success', 'Data berhasil ditambahkan.');
        $this->assertDatabaseHas('bukus', $data);
    }

    public function test_authenticated_user_can_view_buku_detail(): void
    {
        $buku = Buku::factory()->create();

        $response = $this->actingAs($this->user)->get("/buku/{$buku->id}");

        $response->assertStatus(200);
        $response->assertViewIs('buku.show');
        $response->assertViewHas('buku');
    }

    public function test_authenticated_user_can_view_edit_buku_form(): void
    {
        $buku = Buku::factory()->create();

        $response = $this->actingAs($this->user)->get("/buku/{$buku->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('buku.edit');
        $response->assertViewHas('buku');
    }

    public function test_update_buku_success(): void
    {
        $buku = Buku::factory()->create([
            'judul_buku' => 'Old Title',
            'penulis' => 'Old Author',
            'penerbit' => 'Old Publisher',
            'tahun_terbit' => 2020,
        ]);

        $data = [
            'judul_buku' => 'New Title',
            'penulis' => 'New Author',
            'penerbit' => 'New Publisher',
            'tahun_terbit' => 2022,
        ];

        $response = $this->actingAs($this->user)->put("/buku/{$buku->id}", $data);

        $response->assertRedirect('/buku');
        $response->assertSessionHas('success', 'Data berhasil diubah.');
        $this->assertDatabaseHas('bukus', array_merge(['id' => $buku->id], $data));
    }

    public function test_destroy_buku_success(): void
    {
        $buku = Buku::factory()->create();

        $response = $this->actingAs($this->user)->delete("/buku/{$buku->id}");

        $response->assertRedirect('/buku');
        $response->assertSessionHas('success', 'Data berhasil dihapus.');
        $this->assertDatabaseMissing('bukus', ['id' => $buku->id]);
    }
}
