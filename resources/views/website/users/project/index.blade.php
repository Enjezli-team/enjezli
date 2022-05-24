<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('auth_assets/project_assests/css/project_card.css ') }}">
<style>
    /****search effect******/


    /****search effect******/

    .search {
        cursor: pointer;
        color: #186d80;
        font-size: 18px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: transparent;
        padding-right: 40px;
        color: #257587;
    }

    .input-search::placeholder {
        color: gray;
        letter-spacing: 2px;
    }

    .btn-search {
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 16px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: black;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    @media (min-width:768px) {
        .input-search:focus {
            width: 170px;
        }
    }

    .show_more {
        background-color: #186d80;
        color: white;
        border-radius: 0.25rem;
    }

    .show_more:hover {
        background-color: white;
        color: #186d80;
    }

    .price {
        font-size: 33px;
        color: #186d80;
    }

</style>
@extends('website.layouts.master')

@section('content')
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />


    <div class=" py-3 mt-5">
        <div class="page-header min-height-300 border-radius-xl  mt-5" style="min-height: 70px !important;
                                                                                                                border-right: 4px solid #5ab1c5;
                                                                                                                border-radius: 4px;background-color: white;
                                                                                                                padding: 10px 10px;margin: 50px;
    background: #dbe8eb;
                                                                                                                ">
            <h6> تصفح المشاريع </h6>
            <div class="search-box">
                <button class="btn-search">
                    <ion-icon name="search" class="search"></ion-icon>
                </button>
                <input type="text" class="input-search search search-input" placeholder=" ابحث عن ....">
            </div>
        </div>









{{-- code2 --}}
  <!-- CARD STARTS HERE -->
  
  <div class="sec_card">
  @forelse ($data as $item)
  <div class="card">
      <a href="{{ route('projects.show', $item['id']) }}">
    <div class="card__content">
      <div class="card__content-left">
        <img src="svg/enjezle_pro.svg" style="width: 87px;">
        <div class="h_card">
          <h2>
            {{ Str::substr( $item['title'], 0, 20) }} </h2>
          <h6 class="comfort">
              {{-- الحالة: --}}
              @if($item['status']==NULL)
                                       
              
              @if ($item['status'] == 0)
                  <span> مفتوح </span>
                  <span> بإنتظار الموافقة </span>
              @elseif($item['status'] == 2)
                  <span> مغلق </span>
              @endif

              @endif     
        </h6>
         
        </div>
      </div>
      <div class="card__content-right">
        <div class="info-content">
            <ul>
              <li>
                <p class="sound"> {{ $item->sal_created_by->name }}</p>
              </li>
              <li>
                <p class="comfort"> عرض
                    {{ $item->sal_offers->count() }} </p>
              </li>
              <li>
                <p class="noice">{{ $item['created_at'] }}</p>
              </li>
            </ul>
          </div>
          <div class="sec_card2" style="justify-content: space-between">
            <h3 >
                {{ Str::substr($item->description, 0,100) }}  
                
            </h3>
            <a href="/projects/{{ $item['id'] }}" class="btn"> المزيد </a>
          </div>
     
       
      </div>
    </div>
      </a>
      
  </div>
  @empty
  <div style="text-align:center;color:white ; font-weight: bold;font-size:2rem;margin-top:100px;"> لا توجد
      مشاريع</div>
      
{!! $data->links('website.layouts.pagination') !!}
@endforelse


</div>

  <!-- CARD ENDS HERE -->



  <style>
      :root {
  --clr-white: #11505F;
  --clr-blue: #8ECAE6;
  --clr-dark-gray: #fff;
  --fw-light: 400;
}

body {
  /* font-family: "Raleway", sans-serif; */
  /* margin: 2em; */
  /* height: 100vh; */
  display: flex;
  flex-direction: column;
  justify-content: center;
}

/* Floating animation */
@keyframes float {
  0% {
    transform: translatey(0px);
  }
  50% {
    transform: translatey(-20px);
  }
  100% {
    transform: translatey(0px);
  }
}
/* General card container */
.sec_card{
    display: grid;
    grid-template-columns: auto auto;
    gap: 30px;
    margin-left: 50px;
    margin-right: 50px;
}
.sec_card2{
    display: grid;
    grid-template-columns: auto auto;
    gap: 30px;
}
.card {
  display: flex;
  padding-top: 0.5em;
    padding-right: 2em;
    padding-bottom: 0.5em;
    padding-left: 2em;
  background: #8ECAE6;
  background: radial-gradient(circle, #f8fafb 76%, #edf3f5 100%);
  border-radius: 12px;
  -webkit-box-shadow: 0px 5px 18px -6px #8ECAE6;
  box-shadow: 0px 3px 10px -6px #8ecae6;
  max-width: 100%;
  /* margin: 0 auto; */
  margin-top: 12px;
  /* Card inner content */
  /* Medium screens query */
  /* Small screens query */
}
.card .card__content {
  /* display: flex; */
  /* align-items: start; */
  /* flex-direction: row;
   */
  /* Left side content */
  /* Right side content */
}
.h_card{
    display: flex;
    align-items: baseline;
}
.card .card__content .card__content-left {
  display: flex;
  flex-basis: 60%;
  flex-direction: column;
  position: relative;
  /* padding-right: 12em; */
  /* padding-left: 100px;/ */
  /* Floating image */
}
.card .card__content .card__content-left img {
  position: absolute;
  right: 0.4em;
  top: 1em;
  /* -webkit-filter: drop-shadow(5px 5px 15px #1b6e82); */
  /* animation: float 6s ease-in-out infinite; */
}
.card .card__content .card__content-left h1,
.card .card__content .card__content-left h2 {
  color: #227185;
  margin: 0px;
  margin-right: 8rem;
  /* width: 250px; */
}
.card .card__content .card__content-left h6 {
  color: var(--clr-white);
  margin-right: 7px;
}
.card .card__content .card__content-left span{
    background-color: #65a0af;
    color: var(--clr-blue);
    padding: 3px;
    padding-left: 10px;
    padding-right: 10px;
    border-radius:999px;
    font-size: 12px;
  margin: 0px;

}
.card .card__content .card__content-left h1 {
  font-size: clamp(40px, 5vw, 50px);
}
.card .card__content .card__content-left h2 {
  font-size: clamp(30px, 3vw, 30px);
  font-weight: var(--fw-light);
}
.card__content-right{
    /* width: 372px; */
    padding-right: 8rem;
}
.card .card__content .card__content-right h3 {
  color: var(--clr-white);
  font-size: clamp(14px, 1.5vw, 14px);
  font-weight: 400;
  letter-spacing: 0.8px;
  line-height: 140%;
  margin-bottom: 0px;
}
.card .card__content .card__content-right .info-content {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  /* margin-top: 12px; */
  /* Shop button */
}
.card .card__content .card__content-right .info-content ul {
  margin: 0px;
  padding-left: 0px;
  list-style: none;
  display: flex;
}
.card .card__content .card__content-right .info-content ul li {
  /* margin-bottom: 10px; */
  margin-left: 10px;
}
.card .card__content .card__content-right .info-content ul li:last-of-type {
  margin-bottom: 0px;
}
.card .card__content .card__content-right .info-content ul li p {
  font-size: clamp(12px, 1.3vw, 12px);
  letter-spacing: 0.8px;
  color: var(--clr-white);
  display: flex;
  align-items: center;
  gap: 3px;
  /* Icon list */
}
.card .card__content .card__content-right .info-content ul li p.sound::before {
  content: "";
  display: inline-block;
  width: 15px;
  height: 15px;
  background-image: url("svg/person.svg");
  background-size: contain;
  background-repeat: no-repeat;
  /* filter: invert(100%); */
}
.card .card__content .card__content-right .info-content ul li p.comfort::before {
  content: "";
  display: inline-block;
  width: 15px;
  height: 15px;
  background-image: url("svg/time.svg");
  background-size: contain;
  background-repeat: no-repeat;
  /* filter: invert(100%); */
}
.card .card__content .card__content-right .info-content ul li p.noice::before {
  content: "";
  display: inline-block;
  width: 15px;
  height: 15px;
  background-image: url("svg/offer.svg");
  background-size: contain;
  background-repeat: no-repeat;
  /* filter: invert(100%); */
}
.btn {
  background-color:#227186;
  border-radius: 25px;
  max-width: 111px;
  border: none;
  padding: 10px 35px;
  text-decoration: none;
  font-weight: 600 !important;
  letter-spacing: 0.8px;
  color: var(--clr-dark-gray) !important;
  transition: transform 0.3s ease-in;
}
.btn:hover {
  transform: translate(0px, -3px);
}
@media only screen and (max-width: 900px) {
    .sec_card2{
    display: grid;
    grid-template-columns: auto ;
    gap: 30px;
}
    .card .card__content .card__content-right .info-content ul {
  margin: 0px;
  padding-left: 0px;
  list-style: none;
  display: block;
}
    .sec_card{
    display: grid;
    grid-template-columns: auto ;
    gap: 30px;
    margin-left: 50px;
    margin-right: 50px;
}
  .card .card__content {
    flex-wrap: wrap;
  }
  .card .card__content .card__content-left {
    padding-left: 0px;
    flex-basis: 100%;
  }
  .card .card__content .card__content-left img {
    max-width: 120px;
    position: absolute;
    right: 0px;
    left: unset;
    top: 1em;
  }
  .card .card__content .card__content-right h3 {
    margin-bottom: 1em;
  }
}
@media only screen and (max-width: 450px) {
    .sec_card2{
    display: grid;
    grid-template-columns: auto ;
    gap: 30px;
}
    .card .card__content .card__content-right .info-content ul {
  margin: 0px;
  padding-left: 0px;
  list-style: none;
  display: block;
}
    .sec_card{
    display: grid;
    grid-template-columns: auto ;
    gap: 30px;
    margin-left: 50px;
    margin-right: 50px;
}
  .card .card__content-right .info-content {
    flex-direction: column;
    align-items: flex-start !important;
  }
  .card .card__content-right .info-content ul {
    margin-bottom: 1.5em !important;
  }
  .card .card__content-right .info-content a {
    width: -webkit-fill-available;
    text-align: center;
  }
}

  </style>
@endsection
