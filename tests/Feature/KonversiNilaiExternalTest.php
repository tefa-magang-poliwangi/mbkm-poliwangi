<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use Illuminate\Support\Facades\Cache;
class KonversiNilaiExternalTest extends TestCase
{
    protected function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_melihat_homepage()
    {

        $user = User::where(['id'=>9])->first();

        $response = $this->actingAs($user)->get(route('daftar.mahasiswa.index'));

        $response->assertStatus(200);

    }
    public function test_simpan_nilai_konversi()
    {

        $file = UploadedFile::fake()->create('document.pdf', 1024);
        $user = User::where(['id'=>20])->first();

        $response = $this->actingAs($user)->post(route('upload_transkrip_nilai.mahasiswa.external',[9,1,1]),
        ['file' => $file]);

        $this->assertDatabaseHas('nilai_magang_exts', [
            'id_mahasiswa' => '9',
            'id_magang_ext' => '1'
        ]);
    }
}
