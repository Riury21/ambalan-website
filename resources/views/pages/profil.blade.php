@extends('layouts.main')

@section('title', 'Sejarah - Kamajaya Kamaratih')

@section('content')

<!-- CSS untuk Sticky Header dan Konten -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 1);
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
        border-radius: 10px;
    }

    .content-container {
        background-color: rgba(255, 255, 255, 0.9);
        color: rgb(0, 0, 0);
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .badge-container {
        display: flex;
        justify-content: space-between;
        gap: 40px; /* Jarak antar kolom */
        flex-wrap: wrap;
        margin-top: 0px;
    }

    .badge-column {
        flex: 1;
        max-width: 60%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .badge-column img {
        max-width: 33%;
        height: auto;
        border-radius: 10px;
        shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .badge-text {
        text-align: justify;
        font-size: 1rem;
        line-height: 1.6;
        color: #000;
    }

    @media (max-width: 768px) {
        .badge-column {
            max-width: 100%;
        }
        .sticky-top-section {
            top: 0px;
            padding-top: 0.5rem;
        }
    }
</style>

<div class="container py-4">

    <!-- Sticky Title -->
    <div class="sticky-top-section">
        <h1 class="text-center mb-3 d-flex align-items-center justify-content-center gap-2">
            <img src="{{ asset('logo/kjkj.png') }}" alt="Logo KJ" class="img-fluid" style="height: 100px;">
            Profil Kamajaya Kamaratih
            <img src="{{ asset('logo/krkr.png') }}" alt="Logo KR" class="img-fluid" style="height: 100px;">
        </h1>
    </div>

    <!-- Konten Profil -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 100px;">
                    <h2 style="background-color: rgba(255, 255, 255, 0.8); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        Sejarah
                    </h2>
                </div>
            </div>
        </div>
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
                    terus-menerus. Akhirnya, setelah dalam keadaan yang tidak menentu dan jangka waktu yang cukup lama, pada tanggal <strong>18 September 1991</strong> secara
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
    <div class="row justify-content-center mt-2">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 100px;">
                <h2 style="background-color: rgba(255, 255, 255, 0.8); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    Makna Badge
                </h2>
            </div>
        </div>
    </div>
    <!-- Konten Badge -->
    <div class="badge-container">
        <div class="badge-column">
            <img src="{{ asset('logo/kj.png') }}" alt="Logo Kamajaya">
            <div class="badge-text">
                <p>
                    Kamajaya adalah dewa yang sangat tampan dan rupawan. Dalam cerita pewayangan, Kamajaya menjadi simbol kesempurnaan yang mencapai 99%, 
                    dengan 1% sisanya diberikan kepada umat manusia di bumi. Harapan dari simbol ini adalah agar anggota pramuka Kamajaya dapat menjadi sempurna 
                    dalam mengamalkan Tri Satya dan Dasa Dharma, serta menjadi pandu ibu pertiwi.
                    Kamajaya adalah dewa yang sangat tampan dan rupawan. Dalam cerita pewayangan, Kamajaya menjadi simbol kesempurnaan yang mencapai 99%, 
                    dengan 1% sisanya diberikan kepada umat manusia di bumi. Harapan dari simbol ini adalah agar anggota pramuka Kamajaya dapat menjadi sempurna 
                    dalam mengamalkan Tri Satya dan Dasa Dharma, serta menjadi pandu ibu pertiwi.
                </p>
            </div>
        </div>
        <div class="badge-column">
            <img src="{{ asset('logo/kr.png') }}" alt="Logo Kamaratih">
            <div class="badge-text">
                <p>
                    Kamaratih adalah dewi yang sangat cantik dan anggun. Dalam cerita pewayangan, Kamaratih juga menjadi simbol kesempurnaan yang mencapai 99%. 
                    Dengan harapan yang sama seperti Kamajaya, Kamaratih melambangkan kecantikan dan kesempurnaan yang dapat diterapkan dalam kehidupan anggota 
                    pramuka, untuk selalu menjaga keharmonisan dan menjadi pribadi yang membangun.
                </p>
            </div>
        </div>
    </div>
        <div class="col-12">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 100px;">
                    <h2 style="background-color: rgba(255, 255, 255, 0.8); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        Sejarah
                    </h2>
                </div>
            </div>
        </div>
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
                    terus-menerus. Akhirnya, setelah dalam keadaan yang tidak menentu dan jangka waktu yang cukup lama, pada tanggal <strong>18 September 1991</strong> secara
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
