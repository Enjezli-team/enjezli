<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('auth_assets/work_assests/css/header.css')}}">
    <style>
        /*************/
        
        .profile {
            max-width: 57em;
            margin: 13%;
        }
        
        .personal_info_container {
            max-width: 22em;
            border-radius: 17px;
            display: grid;
            gap: 27px;
            background: white;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        
        .project_container {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            gap: 33px;
        }
        
        .container_card {
            padding: 1vh 2vw;
            color: var(--dark_blue);
        }
        
        .container_card header {
            display: grid;
        }
        
        .container_card header h2 {
            text-align: center;
        }
        
        .img_con {
            width: 22em;
            overflow: hidden;
            height: 200px;
        }
        
        .img_con img {
            height: inherit;
            width: inherit;
            border-top-left-radius: 19px;
        }
        /**********/
        
        .heart:hover {
            color: rgb(238, 182, 182);
        }
        
        .show:hover {
            color: gold;
        }
        
        .flex {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .desc {
            height: 85px;
            overflow: hidden;
        }
        
        .container_card .aut_pub {
            color: gray;
            font-size: 12px;
        }
        
        .container_card .desc {
            height: 44px;
            overflow: hidden;
        }
        
        .hr::before {
            content: "";
            width: 287px;
            background-color: #186d80;
            display: block;
            position: relative;
            height: 1px;
            top: 13px;
            background: radial-gradient(#186d80, transparent);
        }
        
        .liks_shows {
            margin-top: 33px;
            display: flex;
            justify-content: space-between;
            padding-bottom: 23px;
            align-items: center;
        }
        
        .liks_shows ul {
            display: flex;
            gap: 12px;
            list-style: none;
        }
        
        .liks_shows ul li a {
            text-decoration: none;
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .jbetween {
            justify-content: space-between;
        }
        /* CSS */
        /* CSS */
        
        .show_more {
            font-size: 16px;
            padding: 7px 21px 7px;
            outline: 0;
            border: 1px solid #186d80;
            cursor: pointer;
            position: relative;
            background-color: rgba(0, 0, 0, 0);
        }
        
        .show_more:after {
            content: "";
            background-color: var(--light_blu);
            width: 100%;
            z-index: -1;
            position: absolute;
            height: 100%;
            top: 7px;
            left: 7px;
            transition: 0.2s;
        }
        
        .show_more:hover:after {
            top: 0px;
            left: 0px;
        }
    </style>

</head>

<body>
    <div class="profile">




        <div class="d-grid  project_container">
            @forelse ($data as $item)
            <div class="personal_info_container myworks">
               
             
                <div class="container_card">
                    <header class="">
                        <h2>{{ $item->title}}</h2>
                        <div class="flex jbetween">
                            <div>
                                <div class="flex">
                                    <span><ion-icon name="map-outline"></ion-icon></span>
                                    <h5> برمجة</h5>
                                </div>
                                <div class="flex">
                                    <span><ion-icon name="time-outline"></ion-icon></span>
                                    <span class="aut_pub">{{ $item->created_at}}</span>

                                </div>

                            </div>

                            <div class="liks_shows">

                                <ul>
                                    <li>
                                        <a href="" class="">
                                            <span>22</span>

                                            <ion-icon class='heart' name="heart-outline"></ion-icon>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="">
                                            <span>222</span>
                                            <ion-icon class='show' name="eye-outline"></ion-icon>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="desc">
                            {{ $item->description}}
                        </div>

                        <div>
                            <span>رابط العمل</span>
                            <span>{{ $item->link}}</span>
                        </div>
                    </header>


                    <div class="hr">
                    </div>
                    <div class="liks_shows">

                        <button class="show_more"><a href="/works/{{ $item->id }}/edit"
                            class="edit_pro button button-1">تعديل</a></button>
                            <form class="card-body" action="/works/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                        <button type="submit" class="show_more">حذف</button></form>

                    </div>

                </div>
              
            </div>
            @empty
                        <div class="flex_between">
                            <div>
                                <h5 class="project_name"> لا يوجد عمل جديد</h5>
                            </div>
                        </div>
            @endforelse

         
        </div>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>