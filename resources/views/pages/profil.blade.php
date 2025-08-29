@extends('layouts.main')

@section('title', 'Sejarah - Kamajaya Kamaratih')

@section('content')

<!-- CSS untuk Sticky Header dan Konten -->
<style>
    .sticky-top-section {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: rgba(255, 255, 255, 0.95);
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
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 0px;
    }

    .badge-column {
        flex: 1;
        max-width: 60%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .badge-column img {
        max-width: 33%;
        height: auto;
        border-radius: 10px;
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

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .sticky-top-section {
            background-color: rgba(30, 30, 30, 0.95);
            border-bottom: 1px solid #333;
        }

        .content-container {
            background-color: rgba(30, 30, 30, 0.9);
            color: #e0e0e0;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .badge-column {
            background-color: rgba(30, 30, 30, 0.9);
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.05);
        }

        .badge-text {
            color: #e0e0e0;
        }

        h2, h4 {
            background-color: rgba(40, 40, 40, 0.9) !important;
            color: #ffffff;
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

    <!-- Sejarah Ambalan -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center" style="background-color: rgba(255, 255, 255, 0.9); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">Sejarah Terbentuknya Ambalan KJKR</h2>
            <div class="content-container">
                <p>Semenjak berdirinya SMA Negeri 1 Sumpiuh pada tahun 1985, barulah pada tahun <strong>1988</strong> tercetus gagasan untuk mendirikan GUGUS DEPAN SMA NEGERI I SUMPIUH. Sejak tahun 1988 mulai diselenggarakan iuran bulanan Pramuka, namun kegiatan kepramukaan belum ada dan berlangsung selama satu tahun.</p>

                <p>Pada bulan <strong>April pada tahun 1989</strong> dibentuk Dewan Pembina dan Mabigus setelah mendapat nomor Gudep yaitu <strong>19.2823 – 19.2824</strong>, yang rencananya pelantikan Pembina dan Mabigus akan dilaksanakan pada bulan itu. Setelah semuanya dipersiapkan dan pelantikan telah siap dilaksanakan, pada pukul 12.00 WIB siang yang menerima amanat pemberitahuan yang isinya tentang penundaan pelantikan karena alasan tersendiri Pembina segera memberitahukan kepada pangkalan lain bahwa pelantikan dibatalkan.</p>

                <p>Akibat dari penundaan tersebut, Gerakan Pramuka di SMA Negeri 1 Sumpiuh <strong>diakui secara de facto (kenyataan)</strong> tetapi <strong>tidak diakui secara de jure (hukum)</strong>.</p>

                <p>Untuk mempertahankan Pramuka di SMA Negeri 1 Sumpiuh , Pembina yang belum dilantik memberanikan diri untuk mengadakan latihan secara terus-menerus yang belum dilantik memberikan amanat. Setelah bertahan dalam keadaan yang tidak menentu, akhirnya pada <strong>tanggal 18 September 1991</strong> lahirlah Gudep 19.2823 – 19.2824 Pangkalan SMA Negeri I Sumpiuh yang masih bertahan hingga saat ini.</p>

                <p>sumber: Buku Adat Pramuka SMA Negeri 1 Sumpiuh</p>
            </div>
        </div>
    </div>

    <!-- Arti Logo -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center" style="background-color: rgba(255, 255, 255, 0.9); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">Logo dan Filosofi Ambalan</h2>
        </div>
        <div class="badge-container">
            <div class="badge-column">
                <img src="{{ asset('logo/kj.png') }}" alt="Logo Kamajaya">
                    <div class="badge-text">
                        <p><strong>Nama Ambalan:</strong><br>
                        Kamajaya adalah tokoh wayang yang melambangkan kesetiaan, kelurusan, dan kebijaksanaan. Nama ini mencerminkan semangat pengabdian yang tulus kepada Pramuka.</p>
                        <p><strong>Warna Dasar:</strong><br>
                        Warna biru tua sebagai dasar logo menggambarkan kesetiaan, ketekunan, dan ketabahan.</p>
                        <p><strong>Gambar Mahkota (lebih tinggi):</strong></p>
                        <ul>
                            <li>3 sudut atas: melambangkan Tri Satya</li>
                            <li>10 bentuk oval: melambangkan Dasa Dharma</li>
                            <li>5 permata: melambangkan ideologi Pancasila</li>
                            <li>Sudut puncak: hubungan dengan Tuhan Yang Maha Esa</li>
                            <li>Tunas kelapa: lambang Gerakan Pramuka</li>
                        </ul>
                        <p><strong>Padi dan Kapas:</strong><br>
                        Melambangkan kemakmuran serta harapan agar Pramuka menjadi insan yang memakmurkan bangsa.</p>
                        <p><strong>Mahkota mengarah ke bintang:</strong><br>
                        Simbol pengabdian dan keyakinan spiritual kepada Tuhan.</p>
                        <p><strong>Bentuk Perisai:</strong><br>
                        Melambangkan kekuatan dan pelindung dari pengaruh negatif.</p>
                        <p><strong>Jumlah Padi (18) dan Kapas (9):</strong><br>
                        Melambangkan tanggal lahir Gugus Depan, yaitu 18 September 1991.</p>
                    </div>
            </div>
            <div class="badge-column">
                <img src="{{ asset('logo/kr.png') }}" alt="Logo Kamaratih">
                    <div class="badge-text">
                        <p><strong>Nama Ambalan:</strong><br>
                        Kamaratih adalah tokoh wayang istri Kamajaya, melambangkan kelembutan, kasih sayang, kesetiaan, dan kekuatan dalam kesempurnaan perempuan.</p>
                        <p><strong>Warna Dasar:</strong><br>
                        Warna biru muda mencerminkan kelembutan dan keteguhan hati yang penuh kesetiaan.</p>
                        <p><strong>Gambar Mahkota (lebih rendah):</strong></p>
                        <ul>
                            <li>5 sudut atas: melambangkan Pancasila</li>
                            <li>3 permata: melambangkan Tri Satya</li>
                            <li>10 bentuk oval: melambangkan Dasa Dharma</li>
                            <li>Sudut puncak: hubungan dengan Tuhan Yang Maha Esa</li>
                            <li>Tunas kelapa: lambang Gerakan Pramuka</li>
                        </ul>
                        <p><strong>Padi dan Kapas:</strong><br>
                        Sama seperti pada Kamajaya, simbol kemakmuran dan kontribusi bagi bangsa.</p>
                        <p><strong>Mahkota mengarah ke bintang:</strong><br>
                        Harapan agar tetap mendekatkan diri pada Tuhan dalam setiap kegiatan.</p>
                        <p><strong>Bentuk Perisai:</strong><br>
                        Perlambang pelindung karakter, agar Pramuka Kamaratih mampu menyaring pengaruh negatif.</p>
                        <p><strong>Jumlah Padi (18) dan Kapas (9):</strong><br>
                        Melambangkan tanggal berdirinya Gugus Depan, yaitu 18 September 1991.</p>
                    </div>
            </div>
        </div>
    </div>

    <!-- Tokoh Wayang Kamajaya Kamaratih -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center" style="background-color: rgba(255, 255, 255, 0.9); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">Tokoh Wayang Kamajaya dan Kamaratih</h2>
                <div class="content-container">
                    <p><strong>Kamajaya</strong> adalah tokoh wayang yang dikenal sebagai dewa cinta dan kasih sayang. Dalam pewayangan Jawa, Kamajaya merupakan personifikasi dari Dewa Asmara atau Kamadeva dalam tradisi Hindu. Ia adalah putra Batara Semar (Ismaya), salah satu punakawan utama yang bijaksana. Kamajaya digambarkan sebagai sosok yang sangat tampan, lembut, dan memancarkan wibawa karena cinta dan ketulusan hatinya.</p>

                    <p>Kamajaya melambangkan kesetiaan, keluhuran budi, kerendahan hati, dan cinta yang spiritual. Ia adalah lambang cinta sejati, seorang suami yang penuh pengabdian dan pemimpin yang bijaksana. Dalam konteks Pramuka, ia mencerminkan semangat pengabdian tulus dan keteguhan hati dalam mengamalkan nilai-nilai Tri Satya dan Dasa Dharma.</p>

                    <p><strong>Kamaratih</strong> adalah pasangan sejati Kamajaya. Ia merupakan dewi cinta dan simbol kesempurnaan perempuan. Kamaratih adalah putri dari Batara Resi Soma, dewa kebijaksanaan. Dikenal pula dengan nama Dewi Ratih, ia melambangkan kecantikan yang sempurna, kelembutan, kasih sayang, dan kesetiaan mutlak kepada suaminya.</p>

                    <p>Kamaratih dikenal sebagai dewi yang sangat sabar, bijaksana, dan berjiwa besar. Ia tidak hanya mencintai Kamajaya secara duniawi, tetapi juga spiritual. Dalam kisahnya, Kamaratih rela menyatu dalam api bersama Kamajaya saat mereka dikutuk oleh Batara Guru karena melanggar aturan kahyangan.</p>

                    <p><strong>Lakon “Gugurnya Kamajaya dan Kamaratih”</strong> adalah kisah legendaris dalam dunia pewayangan. Diceritakan bahwa Batara Guru memerintahkan Kamajaya dan Kamaratih untuk tidak mengganggu para dewa yang sedang bertapa. Namun karena kekuatan cinta mereka, para dewa tergoda. Akhirnya Kamajaya dibakar menjadi abu oleh api tapa Batara Guru. Kamaratih yang setia, ikut melebur jiwanya dalam abu sang suami. Roh keduanya menyatu dan tersebar ke seluruh alam semesta sebagai kekuatan cinta dan pengabdian sejati.</p>

                    <p>Kisah ini dipercaya menjadi asal muasal adanya cinta di hati manusia. Dalam budaya Jawa, cinta Kamajaya dan Kamaratih bukan sekadar asmara, tetapi simbol pengorbanan, kesetiaan, dan kebajikan yang mengakar kuat dalam kehidupan masyarakat.</p>

                    <p>Ambalan Kamajaya–Kamaratih mengambil nama dari tokoh ini dengan harapan bahwa setiap anggota ambalan dapat meneladani nilai-nilai luhur yang diwariskan: pengabdian, kesetiaan, ketulusan, cinta terhadap sesama, serta kekuatan dalam kelembutan.</p>

                    <p><strong>Sumber Referensi:</strong> Serat Kandha Kamajaya–Kamaratih, Ensiklopedi Wayang Purwa, Kajian Budaya UGM, Dalang Ki Manteb Sudarsono, dan Tradisi Lisan Jawa Tengah.</p>
                </div>

        </div>
    </div>

    <!-- Makna untuk Ambalan -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center" style="background-color: rgba(255, 255, 255, 0.9); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">Makna untuk Ambalan Kamajaya – Kamaratih</h2>
            <div class="content-container">
                <p>Pemilihan nama dan simbol Kamajaya–Kamaratih bukan hanya untuk keindahan, melainkan sebagai nilai pendidikan karakter. Ambalan ini diharapkan mencetak Pramuka Penegak yang bijaksana, penuh cinta, tangguh, dan setia pada tugas pengabdian.</p>
                <p>Anggota Ambalan diarahkan untuk mengamalkan nilai Tri Satya dan Dasa Dharma dengan sepenuh hati, serta menjadi generasi muda yang tangguh, siap berkarya, dan menjaga kehormatan bangsa.</p>
            </div>
        </div>
    </div>
    <!-- Lokasi Ambalan  -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <h2 class="text-center" style="background-color: rgba(255, 255, 255, 0.9); padding: 10px 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                Pangkalan SMA Negeri 1 Sumpiuh</h2>
            <div class="content-container">
                <p>Beikut alamat lengkap Pangkalan SMA Negeri 1 Sumpiuh:</p>
                <p><strong>Alamat:</strong> Jl. Raya Barat No.95, Pesantren, Kebokura, Kec. Sumpiuh, Kabupaten Banyumas, Jawa Tengah 53195</p>
                <p><strong>Google Maps:</strong> Klik <a href="https://www.google.com/maps?q=SMA+Negeri+1+Sumpiuh,+Jawa+Tengah" target="_blank" class="btn btn-primary">di sini</a> untuk melihat lokasi di Google Maps.</p>
            </div>
            <!-- Embed Google Maps dengan border -->
            <div class="text-center mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d988.6755010546372!2d109.347968!3d-7.607371!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6545e3a1e7abbb%3A0x3126734132dcf88c!2sSMA%20Negeri%201%20Sumpiuh!5e0!3m2!1sid!2sid!4v1751305014905!5m2!1sid!2sid"
                    width="100%" height="400" 
                    style="border: 10px solid rgba(255, 255, 255, 1); border-radius: 10px;" 
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
