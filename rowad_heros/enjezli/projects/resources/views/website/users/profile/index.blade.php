<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('auth_assets/profile_assests/css/header.css')}}">
    <style>
        .padding {
            padding: 1vh 2vw;
        }
        
        .profile {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 57em;
            background-image: url(assests/svg/enLogo.svg);
            background-repeat: no-repeat;
            background-position: top right;
            margin: 13%;
            padding: 40px 2px;
            border-radius: 17px;
        }
        
        .personal_info_container {
            max-width: 22em;
            border-radius: 17px;
            display: grid;
            gap: 27px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        
        .profile_img {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        
        .personal_basic_info {}
        
        .profile_phone {
            color: gray;
            font-size: 14px;
            padding: 2px 12px;
        }
        
        .personal_information {
            display: flex;
            justify-content: space-between;
        }
        
        .info_container {
            display: grid;
            gap: 12px;
        }
        
        .desc {
            height: 134px;
            white-space: pre-line;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .edit_pro_container {
            padding: 14px 4px;
            text-align: center;
        }
        
        .edit_pro {
            width: 139px;
            height: 30px;
            text-align: center;
            border-radius: 0.25rem;
            outline: none;
            border: none;
            cursor: pointer;
            background-color: var(--beauty);
            font-weight: 900;
            color: var(--light);
        }
        
        .edit_pro:hover {
            box-shadow: 0 0 10px 0 var(--beauty) inset, 0 0 7px 2px #1f6d7a;
        }
        
        .social {
            display: flex;
            gap: 7px;
            font-size: 16px;
        }
        
        .social .face {
            fill: darkblue;
        }
        
        .social li {
            list-style-type: none;
        }
        /**/
        
        .buttons {
            margin-top: 50px;
            text-align: center;
            border-radius: 30px;
        }
        
        .blob-btn {
            z-index: 1;
            position: relative;
            padding: 6px 10px;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            color: var(--beauty);
            font-size: 12px;
            font-weight: bold;
            background-color: transparent;
            outline: none;
            border: none;
            transition: color 0.5s;
            cursor: pointer;
            border-radius: 30px;
        }
        
        .blob-btn:before {
            content: "";
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: 2px solid var(--beauty);
            border-radius: 30px;
        }
        
        .blob-btn:after {
            content: "";
            z-index: -2;
            position: absolute;
            left: 3px;
            top: 3px;
            width: 100%;
            height: 100%;
            transition: all 0.3s 0.2s;
            border-radius: 30px;
        }
        
        .blob-btn:hover {
            color: #fff;
            border-radius: 30px;
        }
        
        .blob-btn:hover:after {
            transition: all 0.3s;
            left: 0;
            top: 0;
            border-radius: 30px;
        }
        
        .blob-btn__inner {
            z-index: -1;
            overflow: hidden;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border-radius: 30px;
            background: #fff;
        }
        
        .blob-btn__blobs {
            position: relative;
            display: block;
            height: 100%;
            filter: url('#goo');
        }
        
        .blob-btn__blob {
            position: absolute;
            top: 2px;
            width: 25%;
            height: 100%;
            background: var(--beauty);
            border-radius: 100%;
            transform: translate3d(0, 150%, 0) scale(1.7);
            transition: transform 0.45s;
        }
        
        .blob-btn__blob:nth-child(1) {
            left: 0%;
            transition-delay: 0s;
        }
        
        .blob-btn__blob:nth-child(2) {
            left: 30%;
            transition-delay: 0.08s;
        }
        
        .blob-btn__blob:nth-child(3) {
            left: 60%;
            transition-delay: 0.16s;
        }
        
        .blob-btn__blob:nth-child(4) {
            left: 90%;
            transition-delay: 0.24s;
        }
        
        .blob-btn:hover .blob-btn__blob {
            transform: translateZ(0) scale(1.7);
        }
        /***/
        /* myworks */
        
        .d-grid {
            display: grid;
            gap: 22px;
        }
        
        .flex_between {
            display: flex;
            justify-content: space-between;
            padding: 1vh 1vw;
        }
        
        .project_date {
            padding: 2px 13px;
            color: #5e5b5b;
            ;
        }
        
        .operation {
            display: flex;
            gap: 15px;
        }
        
        .hr::before {
            content: "";
            width: 287px;
            background-color: #186d80;
            display: block;
            position: relative;
            height: 1px;
            top: -9px;
            background: radial-gradient(#186d80, transparent);
        }
        
        .count_project {
            height: 35px;
            width: 35px;
            background-color: aliceblue;
            border-radius: 23%;
            text-align: center;
            display: grid;
            align-items: center;
            position: absolute;
            top: 74px;
            left: 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgb(207 229 239));
            backdrop-filter: blur(10px);
        }
        
        .delete:hover,
        .edit:hover,
        .more:hover {
            transform: scale(1.2);
            color: rgb(77, 75, 75);
        }
        
        .delete:hover {
            color: red;
        }
        
        @media screen and (max-width: 800px) {
            .profile {
                grid-template-columns: 1fr;
                gap: 23px;
            }
        }
    </style>

</head>

<body>
    <div class="profile">
        <div class="personal_info_container">
            
            <div class="profile_img"> <img src="" alt=""></div>
            <div class="padding info_container ">
                <div class="personal_basic_info">
                    <div class="profile_name">سلمى احمد محمد</div>
                    <div class="personal_information">
                        <div class="profile_phone">779977896</div>
                        <ul class="social">
                            <li>
                                <a href="">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>


                <div>

                    <div class="desc">إنني بدون مبالغة أتنفس بحثًا وعلمًا ولا أجد ضالتي سوى في البحث والتنقيب والتحليل وإجراء التجارب للوصول إلى الابتكارات وحلول المعضلات، والعمل في مركز بحثي مرموق مثل مركز ……. بالطبع سوف يُساعدني على تحقيق هذا المبتغى، وسوف يُساعدني على
                        أن أكون جزءًا من تحقيق أهدافه في إثراء درجة مساهمته العلمية على الساحة الدولية.</div>

                </div>

            </div>

            <div class="edit_pro_container">
                <button class="edit_pro button button-1">تعديل</button>
            </div>
        </div>



        <div class="d-grid">
            <div class="personal_info_container myworks">
                <header class="flex_between">
                    <h3>أعمالي</h3>

                    <div>
                        <button class="blob-btn">
                               عرض كل الاعمال
                               
                              <span class="blob-btn__inner">
                                <span class="blob-btn__blobs">
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                </span>
                              </span>
                            </button>


                    </div>

                </header>
                <div class="hr">
                    <div class="count_project"> 33</div>
                </div>
                <div class="jobs">
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                </div>

            </div>


            <div class="personal_info_container myworks">
                <header class="flex_between">
                    <h3>أعمالي</h3>

                    <div>
                        <button class="blob-btn">
                               عرض كل الاعمال
                               
                              <span class="blob-btn__inner">
                                <span class="blob-btn__blobs">
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                  <span class="blob-btn__blob"></span>
                                </span>
                              </span>
                            </button>


                    </div>

                </header>
                <div class="hr">
                    <div class="count_project"> 33</div>
                </div>
                <div class="jobs">
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                    <div class="flex_between">
                        <div>
                            <h5 class="project_name">تصميم موقع لعيادة طبية</h5>
                            <h6 class="project_date">23/3/2020</h6>
                        </div>
                        <div class="operation">

                            <span><ion-icon class="edit"  name="create-outline"></ion-icon></span>
                            <span><ion-icon class="delete" name="trash-outline"></ion-icon></span>
                            <span><ion-icon  class="more" name="ellipsis-vertical-circle-outline"></ion-icon></span></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>