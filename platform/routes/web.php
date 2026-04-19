<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientesAdminController;
use App\Http\Controllers\Admin\CursosAdminController;
use App\Http\Controllers\Admin\ConsultoriasAdminController;
use App\Http\Controllers\Admin\MensagensAdminController;
use App\Http\Controllers\Admin\EquipaAdminController;
use App\Http\Controllers\Admin\EquipamentosAdminController;
use App\Http\Controllers\Admin\EstatisticasAdminController;
use App\Http\Controllers\Admin\ProjetosAdminController;
use App\Http\Controllers\Admin\TestemunhosAdminController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/servicos', [PublicController::class, 'services'])->name('services');
Route::get('/formacao', [PublicController::class, 'courses'])->name('courses');
Route::get('/sobre', [PublicController::class, 'about'])->name('about');
Route::get('/projetos', [PublicController::class, 'projects'])->name('projects');
Route::get('/contacto', [PublicController::class, 'contact'])->name('contact');
Route::post('/contacto', [PublicController::class, 'sendContact'])->name('contact.send');
Route::get('/fundadores/{slug}', [PublicController::class, 'fundador'])->name('fundador');

// Troca de idioma
Route::get('/locale/{lang}', function (string $lang) {
    $supported = ['pt', 'en', 'fr'];
    if (in_array($lang, $supported)) {
        session(['locale' => $lang]);
    }
    return redirect()->back()->withInput();
})->name('locale.switch');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Área Cliente (protegida)
Route::middleware('auth')->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('dashboard');
    Route::post('/testemunho', [ClienteController::class, 'storeTestemunho'])->name('testemunho.store');
});

// Painel Admin (protegido: auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('clientes', ClientesAdminController::class)
         ->parameters(['clientes' => 'cliente']);
    Route::patch('/clientes/{cliente}/toggle', [ClientesAdminController::class, 'toggleStatus'])
         ->name('clientes.toggle');

    Route::resource('cursos', CursosAdminController::class)
         ->except(['show'])
         ->parameters(['cursos' => 'curso']);
    Route::patch('/cursos/{curso}/toggle', [CursosAdminController::class, 'toggleAtivo'])
         ->name('cursos.toggle');

    Route::resource('consultorias', ConsultoriasAdminController::class)
         ->except(['show'])
         ->parameters(['consultorias' => 'consultoria']);
    Route::patch('/consultorias/{consultoria}/toggle', [ConsultoriasAdminController::class, 'toggleAtivo'])
         ->name('consultorias.toggle');

    // Mensagens de contacto
    Route::get('/mensagens', [MensagensAdminController::class, 'index'])->name('mensagens.index');
    Route::get('/mensagens/{mensagem}', [MensagensAdminController::class, 'show'])->name('mensagens.show');
    Route::delete('/mensagens/{mensagem}', [MensagensAdminController::class, 'destroy'])->name('mensagens.destroy');

    // Equipa
    Route::resource('equipa', EquipaAdminController::class)
         ->except(['show'])
         ->parameters(['equipa' => 'membro']);
    Route::patch('/equipa/{membro}/toggle', [EquipaAdminController::class, 'toggleAtivo'])
         ->name('equipa.toggle');

    // Equipamentos
    Route::resource('equipamentos', EquipamentosAdminController::class)
         ->except(['show'])
         ->parameters(['equipamentos' => 'equipamento']);
    Route::patch('/equipamentos/{equipamento}/toggle', [EquipamentosAdminController::class, 'toggleAtivo'])
         ->name('equipamentos.toggle');

    // Estatísticas
    Route::get('/estatisticas', [EstatisticasAdminController::class, 'index'])->name('estatisticas.index');
    Route::put('/estatisticas', [EstatisticasAdminController::class, 'update'])->name('estatisticas.update');

    // Projetos
    Route::resource('projetos', ProjetosAdminController::class)
         ->except(['show'])
         ->parameters(['projetos' => 'projeto']);
    Route::patch('/projetos/{projeto}/toggle', [ProjetosAdminController::class, 'toggleAtivo'])
         ->name('projetos.toggle');

    // Testemunhos
    Route::resource('testemunhos', TestemunhosAdminController::class)
         ->except(['show'])
         ->parameters(['testemunhos' => 'testemunho']);
    Route::patch('/testemunhos/{testemunho}/toggle', [TestemunhosAdminController::class, 'toggleAtivo'])
         ->name('testemunhos.toggle');
});
