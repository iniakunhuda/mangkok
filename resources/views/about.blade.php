@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Tentang Kami</a></li>
        </ul>
    </div>
</div>
<section class="section--about">
    <div class="banner--block"><img class="banner-img" src="img/banner1.jpg" alt></div>
    <div class="container">
        <div class="about__farmart">
            <div class="about__header">
                <h3 class="about__title">Tentang Kampung Kue Surabaya</h3><br><br>
                <div class="row">
                    <div class="col-md-3">
                        <img src="img/pendiri.jpg" class="img-circle" style="width:200px;height:200px;border-radius: 50%;object-fit: cover;" alt="">
                    </div>
                    <div class="col-md-9">
                        <p class="about__subtilte">Kampung Kue Surabaya merupakan sebuah komunitas yang bergerak dibidang kue di daerah Rungkut, Kota Surabaya. Komunitas ini sudah berdiri sejak tahun 2001 yang diinisiasi oleh Ibu Choirul Mahpuduah</p>
                        <p class="about__des">
                            Resesi ekonomi tahun 1998 dampaknya luar biasa pada segala bidang. Banyak hal yang memicu
terjadinya resesi ekonomi ini. Mulai dari sektor ekonomi, sosial hingga politik.
Anjloknya nilai rupiah, tingginya suku bunga, harga jual barang melesat naik, lebih dari 70%
perusahaan besar di pasar modal bangkrut, PHK terjadi di mana-mana dan gelombang pengangguran
telah terjadi. Mereka sebagian besar adalah perempuan yang bekerja pada perusahaan manufaktur
padat karya. Tingginya angka pengangguran di tambah dengan daya beli masyarakat menurun
membuat angka kemiskinan meningkat. Kemudian berlanjut pada gerakan sosial yaitu terjadinya
gelombang kerusuhan pada tanggal 13-14 Mei 1998 yang kemudian secara politik memaksa presiden
Soeharto meletakkan kekuasaannya setelah 32 tahun berkuasa<br><br>
Hingga tahun 2001, ketika ekonomi agak membaik para perempuan yang menganggur ini tidak lagi
bisa bekerja kembali di tempat mereka semula bekerja karena dianggap tidak produktif lagi selain
yang paling mendasar karena politik perburuhan sudah berubah, terjadi informalisasi hubungan kerja.
Buruh outsourcing, kontrak, buruh lepas menjadi wacana sehari-hari. Karena tidak bisa masuk di
pekerjaan formal para perempuan banyak yang menganggur , mempunyai usaha kecil- kecilan di
rumah atau bekerja dengan mengambil garapan dari perusahaan atau pengepul untuk di kerjakan di
rumah. Mereka menyediakan peralatan kerja sendiri, tidak ada jaminan sosial, dan mereka
menanggung sebagian dari biaya produksi atas barang yang di kerjakan dengan upah yang murah.
Mereka biasanya di sebut dengan pekerja rumahan putting out system dan self employee bagi mereka
yang mempunyai usaha mandiri di rumah misalnya usaha mikro.<br><br>
Tahun 2005, gagasan penguatan perempuan menghadapi dampak krisis ekonomi mulai di gagas dan
di rumuskan. Banyaknya perempuan yang menganggur, meningkatnya jumlah keluarga miskin atau
gakin, adanya beberapa orang yang membuat kue serta mudahnya akses terhadap bahan baku dan
akses distribusi hasil produksi telah menjadi pertimbangan utama untuk mendirikan Kampung Kue
sebagai Wisata Kuliner dan Wisata Edukasi . Sehingga tidak ada orang yang menganggur di lingkungan
tempat tinggal saya khususnya perempuan.<br><br>
Adanya gap antara penduduk asli dan pendatang serta menolaknya sebagian masyarakat tidak akan
menyurutkan saya untuk selalu melakukan perubahan kearah yang lebih baik bagi orang- orang di
sekitar saya terutama perempuan bersama keluarganya.<br><br>
Pada perkembangannya banyak perempuan yang terlibat dalam pendidikan dan pelatihan yang
dilakukan baik sebagai peserta maupun sebagai fasilitator dan instruktur juga narasumber . Mereka
terlibat dalam proses mendirikan Kampung Kue. Mereka tidak hanya dari Surabaya tapi bahkan dari
luar Surabaya.<br><br>
Membangun hubungan strategis dengan berbagai pihak pun telah dilakukan yaitu dengan Dinas-dinas
yang ada di kota Surabaya maupun Propinsi Jawa Timur yang telah memberi pendampingan, ijin usaha
baik PIRT, Halal, Uji Nutrisi, packaging , B2B , merk secara gratis. Bogasari Flour Mills untuk
peningkatan kapasitas atau ketrampilan dengan pelatihan-pelatihan membuat berbagai macam kue ,
food photography , pembuatan logo atau merk di Bogasari Baking Center secara gratis. Bersama PT.
HM .Sampoerna dengan mendirikan Taman Belajar Masyarakat untuk memudahkan mendapat resepresep yang dibutuhkan, menjadi media pembelajaran untuk anak-anak serta membantu promosi dan
pemasaran melalui Sampoerna Expo hingga menjadi UKM Binaan SETC. Adapun dengan PT.Telkom
Jawa Timur Kampung Kue secara gratis mendapat jaringan WiFi selama 2 tahun, pelatihan digital 
marketing untuk promosi dan memasarkan produk secara online dengan jangkauan pasar yang lebih
luas serta untuk membidik pasar menengah keatas.<br><br>
Publikasi juga dilakukan secara terus menerus melalui koran, radio, tv, sosial media, berita online lokal,
nasional maupun regional. Agar Kampung Kue di kenal oleh masyarakat luas.
Seiring di kenalnya Kampung Kue , banyak pihak baik dari luar kota, luar pulau dan bahkan luar negeri
telah berkunjung ke Kampung Kue. (Jombang menjadi Kampung Kue Diwek, Tangerang sentra Kue di
Tangerang, Kampung Kreatif Tangerang, pemerintah Mahakam, Tim Ahli Gubernur Jateng, Austria,
Korea, Philipines, Brunei, Hongkong, Macau, Singapura, Inggris, Holland, Jepang dll. Serta menjadi
tujuan magang siswa SMK, Mahasiswa dan tugas kuliah S1/S2 , penelitian serta Pengabdian
Masyarakat
</p>
                    </div>
                </div>
            </div>
            <div class="about__number">
                <div class="about__number-block">
                    <div class="number">60</div>
                    <div class="description">unit dagang</div>
                </div>
                <div class="about__number-block">
                    <div class="number">100</div>
                    <div class="description">kepala keluarga</div>
                </div>
                <div class="about__number-block">
                    <div class="number">300+</div>
                    <div class="description">jenis kue terjual</div>
                </div>
                <div class="about__number-block">
                    <div class="number">100+</div>
                    <div class="description">pelanggan</div>
                </div>
            </div>
            <div class="row about__service">
                <div class="col-12 col-lg-3">
                    <div class="about__service-block">
                        <div class="service__icon"><i class="icon-man-woman"></i></div>
                        <h6 class="service__title">Ekonomi Masyarakat</h6>
                        <p class="about__des">Dengan order di kampung kue, Anda telah membantu perekonomian masyarakat</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="about__service-block">
                        <div class="service__icon"><i class="icon-star-half"></i></div>
                        <h6 class="service__title">Kualitas Kue Terjamin</h6>
                        <p class="about__des">Tidak perlu ragu dengan kualitas kue buatan para unit dagang di kampung kue.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="about__service-block">
                        <div class="service__icon"><i class="icon-heart-pulse"></i></div>
                        <h6 class="service__title">Dari Hati</h6>
                        <p class="about__des">Pembuatan kue dan pesanan akan dilayani sesuai pesanan Anda.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="about__service-block">
                        <div class="service__icon"><i class="icon-landscape"></i></div>
                        <h6 class="service__title">Kehidupan Lebih Baik</h6>
                        <p class="about__des">Semua Unit Dagang yang tergabung sangat terbantu dengan adanya kampung kue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
