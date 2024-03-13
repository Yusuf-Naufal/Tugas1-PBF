# Yusuf Naufal Zuhdi #220302047
# Selamat Datang di CodeIgniter4
CodeIgniter adalah Application Development Framework - toolkit - untuk orang yang membangun situs web menggunakan PHP. Tujuannya adalah untuk memungkinkan pengembangan proyek jauh lebih cepat daripada menulis kode dari awal, dengan menyediakan seperangkat perpustakaan yang kaya untuk kebutuhan umum tugas, serta antarmuka yang sederhana dan struktur logis untuk diakses perpustakaan ini.

### Apa itu Framework?
Framework merupakan suatu kerangka kerja yang dipakai dalam pengembangan situs web.

### Persyaratan yang diperlukan?
    1. PHP versi 7.4 atau lebih
    2. Database yang didukung : 
    - MySQL (versi 5.1) 
    - PostgreSQL (versi 7.4)
    - SQLite3
    - Microsoft SQL Server (versi 2005)
    - Oracle Database (versi 12.1)


# Installasi
### 1. Menggunakan Composer 
- Download Composer pada browser
- Membuat File CI dengan perintah 
```bash
  php spark create-project codeigniter4/appstarter <nama_folder> 
```
### 2. Download Manual 
- Anda dapat mendownload Github berikut 
- Download Codeigniter4 pada web resmi 

### Konfigurasi Awal
Mengubah File 'env' menjadi '.env' dan mengubah Enviroment
```bash
  CI_ENVIRONMENT = development
```

# Struktur Framework CodeIgniter 4
CodeIgniter memiliki beberapa folder yang dapat digunakan dalam pengembangan seperti : 
#### 1. App
Ini adalah direktori utama dari aplikasi Anda. Struktur di dalamnya biasanya adalah sebagai berikut:
- Config/ → Menyimpan File konfigurasi
- Controllers/ → Menentukan alur program
- Database/ → Menyimpan File Migration database dan File Seed
- Filters/ → Meyimpan kelas filter yang dapat berjalan sebelum dan sesudah Controllers
- Helpers/ → Menyimpan koleksi fungsi – fungsi mandiri
- Language/ → Dukungan beberapa Bahasa
- Libraries/ → Kelas” yang berguna yang tidak masuk dalam kategori lain
- Models/ → Bekerja dengan Database untuk merepresentasikan entitas bisnis
- ThirdParty/ → Pustaka pihak ketiga
- Views/ → Tampilan membentuk HTML yang ditampilkan ke klien
#### 2. public 
Direktori ini berisi file-file yang dapat diakses secara publik melalui web server. Pada Github yang saya buat terdapat Folder `asset-admin` yang isinya template bootstrap (ccs,js,img,demo) untuk tampilan dashboard
#### 3. writable 
Direktori yang memerlukan izin penulisan oleh server web Anda.

#### 4. test 
Direktori yang digunakan untuk menyimpan semua file pengujian (tests) untuk aplikasi yang akan dibuat
#### 5. vendor / system
Direktori inti dari framework CodeIgniter.

# Models, Views, Dan Controllers (MVC)

Mengatur kode agar mudah ditemukan file yang tepat dan membuatnya mudah dimaintenance

#### Model
Mengelola data aplikasi dan membantu menegakkan aturan bisnis khusus yang mungkin diperlukan aplikasi.

#### Views
File sederhana, dengan sedikit atau tanpa logika, yang menampilkan informasi kepada pengguna.

#### Controllers

Bertindak sebagai kode lem, menyusun data bolak-balik antara tampilan (atau pengguna yang melihatnya) dan penyimpanan data.

# Modeling Data
Modeling data dalam CodeIgniter mengacu pada proses mendefinisikan dan mengelola struktur data dari aplikasi. **Tugas** utama dari model adalah untuk memanipulasi data, melakukan operasi pembacaan, penulisan, pembaruan, dan penghapusan data dari database.

Membuat File model dengan menggunakan terminal 
```
php spark make:model <nama_model>
```
Konfigurasi awal File : 
```PHP 
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = '<nama_tebel_';
    protected $primaryKey = '<PK pada tabel>';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array | object';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['kolom1', 'kolom2']; //Kolom yang dapat diisi
    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
```

Pada Github yang sudah saya buat. Terdapat File **KategoriModel.php** pada **app/Model** dengan isian 
```PHP
<?php

namespace app\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori_produk'; //Nama Tabel
    protected $primaryKey       = 'id_kategori'; //PK pada tabel
    protected $returnType       = 'object'; // Berbasis OOP
    protected $allowedFields    = ['nama_kategori','slug_kategori']; //Kolom yang mau di isi


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
}
```

Keterangan : 
Menggunakan model yang disediakan oleh CodeIgniter untuk pembuatan CRUD untuk menentukan tabel yang digunakan. 
# Database Migration
Database migration pada CodeIgniter (CI) adalah proses yang memungkinkan Anda untuk secara terstruktur dan mudah mengelola perubahan skema database Anda. Ini memungkinkan Anda untuk membuat, mengubah, dan menghapus tabel serta struktur database lainnya dengan cara yang terdokumentasi dengan baik dan dapat diulangi.

#### Membuat File Migration pada terminal 
```
php spark make:migration <nama_file>
```
#### Konfigurasi Awal File :
```
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlog extends Migration
{
    public function up()
    {
        
    }
    public function down()
    {
        
    }
}
```

Pada Github yang saya buat, terdapat File **'2024-03-10-080054_KategoriProduk.php'** pada **app/Database/Migration/** dengan isian : 
```
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            //agar id tidak dapat dilihat
            'slug_kategori' => [ //kategori elektronik => kategori-elektronik
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_input' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal_ubah' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_kategori', true); //Identifikasi PRIMARY KEY
        $this->forge->createTable('kategori_produk');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_produk');
    }
}

```

File ini bertjuan untuk membuat tabel baru tanpa membuka PHPMyAdmin. Dengan mendeklarasikan kolom yang diperlukan dan menambahkan perintah 
```
$this->forge->createTable('kategori_produk');

```
kemudian menambah tabel secara otomatis dengan perintah 
```
php spark migrate
```
Tabel sudah berhasil dibuat pada Database 
# Aturan Perutean
proses pengaturan cara CodeIgniter mengurai permintaan HTTP yang diterimanya untuk menentukan tindakan yang akan diambil dan kontroler mana yang akan memprosesnya.

Contoh : 

```php
$routes->get('news', [News::class, 'index']);
```

Keterangan 

- ‘news’ → Tampilan pada URL (http::/localhost:8080/news)
- News::class → Class pada Controller
- ‘index’ → method pada class controller tersebut

Dapat ditulis dalam berbagai bentuk seperti : 

```php
$routes->get('news', 'News::index');
```

```php
$routes->get('news', [\App\Controllers\News::class,'index']);
```

#### Menggunakan Placeholder 
| Placeholders | Description |
| --- | --- |
| (:any) | Mencocokan semua karakter hingga akhir URL |
| (:segment) | Cocok dengan karakter apapun kecuali garis miring yang membatasi  |
| (:num) | Cocok dengan bilangan bulat  |
| (:alpha) | Cocok dengan string karakter alfabet  |
| (:alphanum) | Cocok dengan string karakter alfabet atau bilangan bulat atau kombinasi keduanya |
| (:hash) | sama seperti (:segment), tapi dapat dengan mudah melihat rute mana yang menggunakan ID hash |

- Contoh : 
```php
$routes->post('daftar-kategori/hapus/(:num)','Admin\ProdukController::destroy/$1');
// destroy/$1 -> menghapus id ke-n
```
Keterangan : mengambil paramater untuk query

### Global Options

```php
$routes->get('profile', 'UserController::showProfile', ['filter' => 'auth']);
```

```php
$routes->post('login', 'AuthController::login', ['filter' => 'guest']);
```

```php
$routes->add('tasks', 'TaskController::addTask');
```

```php
$routes->delete('users/(:num)', 'UserController::deleteUser/$1');
```

```php
$routes->put('users/(:num)', 'UserController::updateUser/$1');
```
# Membuat Aplikasi Pertama 
Membuat Aplikasi dengan menerapkan struktur Models, Views, Constrollers (MVC)

### Membuat Halaman Statis 
Halaman ini berisikan template untuk membuat **Navigasi, Header, Footer, dll** dimana halaman tidak berubah ketika ada data baru 

Langkah - langkah membuatnya : 
#### 1. Membuat Peruteran 
``` 
use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
**File :** app/Config/Route.php 

Keterangan : 
- $routes
- get () 
- pages : Tampilan pada URL 
- (:segment) : PlaceHolder
- Pages::class : Class yang ada pada Controllers
- index / view : Method yang ada pada class

#### 2. Membuat Controller 
Membuat Controller dengan nama 'Pages.php'
```PHP
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}
```
**File :** app/Controllers/Pages.php

Terdapat 2 method dalam Class Pages yaitu index () dan view ()

#### 3. Membuat Views
- Membuat View 'template' untuk membuat **header** dan **footer**
```
<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>

    <h1><?= esc($title) ?></h1>
```
**File :** app/Views/templates/header.php
```
<em>&copy; 2022</em>
</body>
</html>
```
**File :** app/Views/templates/footer.php
- Membuat Views 'pages' untuk isian home dan about 
```
<h1> INI ADALAH ISIAN HOME.PHP </h1>
```
**File :** app/Views/pages/home.php
```
<h1> INI ADALAH ISIAN ABOUT.PHP </h1>
```
**File :** app/Views/pages/about.php

#### 4. Mengaktifkan Server Lokal
```
php spark serve
```

Coba beberapa URL yang telah ditambahkan : 
- [localhost:8080/](http://localhost:8080/) → Menampilkan menu utama CI
- [localhost:8080/pages](http://localhost:8080/pages) → Menampilkan method index
- [localhost:8080/home](http://localhost:8080/home) → Menampilkan Isi Home
- [localhost:8080/about](http://localhost:8080/about) → Menampilkan isi About
- [localhost:8080/shop](http://localhost:8080/shop)  → 404, karena tidak ada dalam routes

### Membuat Halaman Dinamis 
Halamain ini untuk menampilkan data yang dapat diperbaharui melalui Database 

Langkah - langkah membuatnya : 

#### 1. Membuat Database 
    CREATE TABLE news (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        title VARCHAR(128) NOT NULL,
        slug VARCHAR(128) NOT NULL,
        body TEXT NOT NULL,
        PRIMARY KEY (id),
        UNIQUE slug (slug)
        );


#### 2. Mengisi Data pada Tabel 
```
INSERT INTO news VALUES
(1,'Elvis sighted','elvis-sighted','Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
(2,'Say it isn\'t so!','say-it-isnt-so','Scientists conclude that some programmers have a sense of humor.'),
(3,'Caffeination, Yes!','caffeination-yes','World\'s largest coffee shop open onsite nested coffee shop for staff only.');
```
#### 3. Menghubungkan Database
- Menghubungkan melalui '.env'  
```
database.default.hostname = localhost
database.default.database = <nama_database>
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

- Atau Menghubungkan Database melalui app/Config/Database.php
```PHP
public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => '',
        'database'     => '<nama_database>',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
    ];

```
#### 4. Membuat Model 
Membuat Model dengan nama 'NewModel'
```PHP
<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
```

#### 5. Membuat Perutean 
```
use App\Controllers\News; // Tambahkan Line ini
use App\Controllers\Pages;

$routes->get('news', [News::class, 'index']);           // Tambahkan Line ini
$routes->get('news/(:segment)', [News::class, 'show']); // Tambahkan Line ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
**File :** app/Config/Routes.php

#### 6. Membuat Controller
Membuat Controller dengan nama 'News.php'
```PHP
<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function show($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}
```
**File :** app/Controllers/News.php

#### 7. Membuat Views
- Membuat View untuk method index ()
```
<h2><?= esc($title) ?></h2>

<?php if (! empty($news) && is_array($news)): ?>

    <?php foreach ($news as $news_item): ?>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['body']) ?>
        </div>
        <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>
```
**File :** app/Views/news/index.php
- Membuat View untuk method view()
```
<h2><?= esc($news['title']) ?></h2>
<p><?= esc($news['body']) ?></p>
```
**File :** app/Views/news/view.php

#### 8. Mencoba URL yang telah di tambahkan 
- [localhost:8080/news ](http://localhost:8080/news ) → Menampilkan isi database


