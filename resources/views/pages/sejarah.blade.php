@extends('layouts.main')

@section('title', 'Sejarah - Kamajaya Kamaratih')

@section('content')

<!-- CSS untuk Sticky Header dan Background Teks -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 1);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px; /* Membuat sudut tumpul */
    }

    @media (max-width: 768px) {
        .sticky-top-section {
            top: 50px;
            padding-top: 0.5rem;
        }
    }

    .content-container {
        background-color: #ffffff; /* Warna background putih */
        color:rgb(0, 0, 0); /* Warna teks biru */
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
        border-radius: 10px; /* Membuat sudut background lebih halus */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Memberikan sedikit bayangan untuk estetika */
    }

    .content-container a {
        color: #007bff; /* Warna link biru cerah */
        text-decoration: none;
    }

    .content-container a:hover {
        text-decoration: underline;
    }
</style>

<div class="container py-4">

    <!-- Sticky Title -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kjkj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 100px;">
            Sejarah Ambalan Kamajaya Kamaratih
            <img src="{{ asset('logo/krkr.png') }}" alt="Logo KR" class="img-fluid" style="height: 100px;">
        </h1>
    </div>

    <!-- Konten Sejarah -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="content-container">
                <p>
                    Semenjak berdirinya sekolah tercinta kita ini, yakni SMA N Sumpiuh pada tahun 1985. Sekitar tahun 1988
                    tercetuslah gagasan untuk mendirikan <strong>GUGUS DEPAN SMA NEGERI SUMPIUH</strong>. Pada tahun itulah mulai
                    diselenggarakan iuran bulanan pramuka, namun kegiatan kepramukaan belum ada dan hanya berlangsung satu tahun saja.
                </p>
                <p>
                    Pada bulan April tahun 1989 dibentuk <strong>Dewan Pembina</strong> dan <strong>Mabigus</strong> setelah mendapat nomor Gudep
                    (<i>Gugus Depan</i> maksudnya...) 19.2823-19.2824. Rencananya Pembina sekaligus Mabigus akan dilantik pada bulan itu. Akan tetapi,
                    setelah semuanya dipersiapkan dan pelantikan pun telah siap dilaksanakan, muncul hambatan berupa penundaan pelantikan.
                </p>
                <p>
                    Dengan adanya penundaan tersebut, Pembina segera memberitahukan kepada pangkalan lain bahwa upacara pelantikan ditunda.
                    Akibatnya Gerakan Pramuka (GP) di SMA N Sumpiuh diakui secara <i>de facto</i> (kenyataan) namun tidak diakui secara <i>de jure</i> (hukum).
                </p>
                <p>
                    Maka dari itu, untuk mempertahankan Pramuka di SMA N Sumpiuh, Pembina yang belum dilantik memberanikan diri untuk mengadakan latihan secara
                    terus-menerus. Akhirnya, setelah dalam keadaan yang tidak menentu dan jangka waktu yang cukup lama, pada tanggal 18 September 1991 secara
                    resmi lahirlah Gudep 19.2823-19.2824 Pangkalan SMA N Sumpiuh yang masih bertahan hingga saat ini.
                </p>
                <p>
                    Pangkalan ini diberi nama <strong>KAMAJAYA KAMARATIH</strong>. Nama ini diambil dari nama sepasang Dewa dan Dewi dalam cerita pewayangan.
                    Kamajaya adalah dewa yang sangat tampan dan rupawan, sedangkan Kamaratih adalah dewi yang sangat cantik dan anggun. Dalam cerita pewayangan,
                    Kamajaya dan Kamaratih adalah simbol kesempurnaan yang mencapai 99%, dengan 1% sisanya diberikan kepada umat manusia di bumi.
                </p>
                <p>
                    Dengan simbol sepasang Dewa Dewi yang memiliki kesempurnaan ini, pendiri pangkalan berharap agar Ambalan Kamajaya Kamaratih mampu menjadi
                    Pramuka yang sempurna, mengamalkan <strong>Tri Satya</strong> dan <strong>Dasa Dharma</strong>, serta menjadi pandu ibu pertiwi.
                </p>
                <p>
                    Keren bukan? Inilah asal usul nama <strong>Kamajaya Kamaratih</strong>. Semoga kita semua mampu mewujudkan harapan ini.
                </p>
                <p>
                    sumber : <a href="https://thegatsofkjkr.blogspot.com/2012/11/sejarah-kjkr.html" target="_blank">https://thegatsofkjkr.blogspot.com/2012/11/sejarah-kjkr.html</a>
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
