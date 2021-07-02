@extends('user.layouts.app')

@section('title', 'Carikan Plasma')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Carikan Plasma</h3>
      <p>
        Selamat datang di halaman Pencarian Plasma. Disini anda akan diarahkan untuk memulai prosedur pencarian plasma.
        Untuk mencari plasma, ikuti langkah langkah berikut :
      </p>
      <ul>
        <li>Lengkapi data diri pengguna pada halaman <a href="{{route('detail-pengguna')}}">detail pengguna</a></li>
        <li>Isi kolom Tipe dengan "Pendonor"</li>
        <li>Lengkapi Bukti pendukung</li>
        <li>Submit</li>
        <li>Tunggu hingga admin memvalidasi data anda</li>
        <li>Anda dapat melihat status donor anda pada halaman <a href="{{route('profile')}}">profil</a></li>
      </ul>

      <h3>Syarat & Ketentuan</h3>
      <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" readonly>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima aut dolores rem maiores, dicta repudiandae blanditiis fugiat impedit tenetur debitis consequatur sint natus quia incidunt nemo laborum deserunt officiis doloribus illo cum similique? Molestiae ex numquam ullam, maiores delectus cum labore quam? Earum voluptatum rem facilis, a ex dolores ad temporibus sit odio tempore molestias. Repudiandae, veniam, vero hic atque modi provident optio eligendi velit sint sed asperiores ipsa reprehenderit repellat recusandae aliquid ducimus quia ipsum debitis? Obcaecati numquam non doloribus quas explicabo distinctio, a corrupti, quo cum impedit excepturi architecto ab! Perspiciatis doloribus ducimus ipsam. Voluptas voluptatem suscipit laudantium. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam consequuntur nemo, ullam omnis eum necessitatibus adipisci nam facere ipsum consequatur. Sequi eaque iste aliquid omnis autem ea non tenetur aut minus veritatis tempora amet illo quis animi quae perspiciatis vol
        </textarea>
      </div>
      <form action="post">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="setuju">
          <label class="form-check-label" for="setuju">
            Saya menyetujui syarat dan ketentuan diatas
          </label>
        </div>

        <button type="submit" class="btn btn-primary float-right">Cari Plasma</button>

      </form>


    </div>
  </div>

</div>

@endsection
