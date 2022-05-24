@extends('website.layouts.master')
@section('content')
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <style>
        .mo_footer {
            display: flex;
            align-items: center;
            justify-items: space-between;
            gap: 15px;
        }


        @media (max-width: 800px) {
            .mo_footer {
                display: grid !important;
                align-items: center !important;
                justify-items: center;
                gap: 15px;
            }

        }

        .fa-star {
            color: gold;
        }

    </style>
    <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />
    <div class="container-fluid py-4 mt-5 bg-white ">
        <div class="page-header min-height-150 border-radius-xl mt-4 d-flex justify-content-center"
            style="background-position-y: 50%;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class='text-center  text-white ' style='z-index:11'>
                <h5 class="text-white text-center">
                        كافة المنجزيين
                </h5>

            </div>
        </div>
    </div>
   


    {{-- code2 --}}

    <div class="per_card">
        
        @forelse($data as $item)
        <div class="per_con">
          <img class="per_img" src="{{$item->user->image}}" alt="product designer">
          <h1 class="per_txt">   {{ $item->user->name }} </h1>
          @for ($i = 0; $i < 5; $i++)
          @if (floor($item->user->ratings) - $i >= 1)
              {{-- Full Start --}}
              <i class="fas fa-star text-warning"> </i>
          @elseif ($item->user->ratings - $i > 0)
              {{-- Half Start --}}
              <i class="fas fa-star-half-alt text-warning">
              </i>
          @else
              {{-- Empty Start --}}
              <i class="far fa-star text-warning"> </i>
          @endif
      @endfor
          <h3 class="per_job ">   {{ Str::substr($item->user->sal_profile->Job_title, 0, 20) }}
        </h3>
          <p class="per_des">    {{ Str::substr($item->user->sal_profile->description, 0, 50) }} </p>

     
                <div class="per_soc">
                  <a class="per_soc_a" href="{{ $item->user->sal_profile->facebook }}">
                    <svg class="per_svg" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" /></svg>
                  </a>
          
                  <a class="per_soc_a" href=" {{ $item->user->sal_profile->tweeter }} ">
                    <svg class="per_svg" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" /></svg>
                  </a>
          
                
          
          
                  <a class="per_soc_a" href="{{ $item->user->sal_profile->github }}  ">
                    <svg class="per_svg" role="img" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                      <g><path d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055"></path></g>
                    </svg>
                </a>
          
              
                </div>
          
          {{-- <button class="per_btn">Hire Me</button> --}}
          <a href="/providers/{{$item->user->id}}" class="btn btn-sm  btn-outline-primary border-0"> المزيد</a>
          {{-- <a href="/chat/{{$item->user->id}}" class="btn btn-sm btn-outline-primary border-0"> مراسله</a> --}}
        </div>
        
        @empty
        <div class="card card-body blur shadow-blur mx-4  overflow-hidden col-5 margin-12">
            <h6 class=" mb-0 "> لا يوجد مزودي خدمات</h6>
        </div>
    @endforelse
      </div>
      
      {!! $data->links('website.layouts.pagination') !!}


      <style>
          .per_card{
            display: flex; 
background-image:  linear-gradient(to bottom right, var(--tw-gradient-stops)); 

display: grid; 

grid-template-columns: auto auto auto auto;
gap: 30px;
margin-left: 50px;
margin-right: 50px;
justify-content: center; 
align-items: center; 
          }
          .per_con{
            padding: 1rem; 
background:  radial-gradient(circle, #f8fafb 76%, #edf3f5 100%);; 
font-weight: 600; 
text-align: center; 
max-width: 300px;
    max-height: 382px;
border-radius: 12px; 
border-width: 1px; 
box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); 


          }
          .per_img{
            margin-bottom: 0.75rem; 
width: 8rem; 
height: 8rem; 
border-radius: 9999px; 
box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); 

   
          }
.per_txt{
    color: #227185; 
font-size: 1.125rem;
line-height: 1.75rem; 

}
.per_job{
    color: #227185; 
font-size: 0.875rem;
line-height: 1.25rem; 
}
.per_des{
    margin-top: 1rem; 
color: #227185; 
font-size: 0.75rem;
line-height: 1rem; 

}
.per_btn{
    padding-top: 0.5rem;
padding-bottom: 0.5rem; 
padding-left: 2rem;
padding-right: 2rem; 
margin-top: 2rem; 
background-color: #227185; 
color: #F3F4F6; 
font-weight: 600; 
letter-spacing: 0.025em; 
text-transform: uppercase; 
border-radius: 1.5rem; 
border: none;
}
.btn-outline-primary:hover:not(.active) {
    background-color: #cce5ed;
    opacity: .75;
    box-shadow: none;
    color: #1f95b1;
}
.per_soc{
    display: flex; 
flex-wrap: wrap; 
justify-content: center; 
gap: 0.5rem; 
}
.per_soc_a{
    display: inline-flex; 
padding: 0.1rem; 
margin-left: 0.5rem; 
margin-bottom: 0.5rem; 
/* background-color: #1f95b1;  */
color: #ffffff; 
font-weight: 400; 
display: inline-flex; 
align-items: center; 
border-radius: 0.25rem; 
}
.per_svg{
    width: 1.25rem; 
height: 1.25rem; 
fill: #1f95b1; 

}

@media only screen and (max-width: 900px) {
    .per_card{
            display: flex; 
background-image:  linear-gradient(to bottom right, var(--tw-gradient-stops)); 

display: grid; 

grid-template-columns: auto auto ;
gap: 30px;
margin-left: 50px;
margin-right: 50px;
justify-content: center; 
align-items: center; 
          }
}
  
@media only screen and (max-width: 400) {
    .per_card{
            display: flex; 
background-image:  linear-gradient(to bottom right, var(--tw-gradient-stops)); 

display: grid; 

grid-template-columns: auto ;
gap: 30px;
margin-left: 50px;
margin-right: 50px;
justify-content: center; 
align-items: center; 
          }
}
    </style>

@endsection
