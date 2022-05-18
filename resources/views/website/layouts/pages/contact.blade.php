   <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body,
        input,
        textarea {
            font-family: "Poppins", sans-serif;
        }
        
        .container {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 2rem;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top:12vh;
        }
        
        .form {
            width: 100%;
            max-width: 820px;
            background-color: #176d8242;
            border-radius: 10px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow: hidden;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
        
        .contact-form {
            background-color: white;
            position: relative;
        }
        
        .contact-form:before {
            content: "";
            position: absolute;
            width: 26px;
            height: 26px;
            background-color: #176d8247;
            transform: rotate(45deg);
            top: 50px;
            left: -13px;
        }
        
        form {
            padding: 2.3rem 2.2rem;
            z-index: 10;
            overflow: hidden;
            position: relative;
        }
        
        .title {
            color: black;
            font-weight: 500;
            font-size: 18px;
            line-height: 1;
            margin-bottom: 0.7rem;
            font-weight: 800;
        }
        
        .input-container {
            position: relative;
            margin: 1rem 0;
        }
        
        .input {
            width: 100%;
            outline: none;
            border: 2px solid #176d82;
            background: none;
            padding: 0.6rem 1.2rem;
            color: #176d82;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            border-radius: 7px;
            transition: 0.3s;
        }
        
        textarea.input {
            padding: 0.8rem 1.2rem;
            min-height: 150px;
            border-radius: 22px;
            resize: none;
            overflow-y: auto;
        }
        
        .input-container label {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            padding: 0 0.4rem;
            color: black;
            font-size: 0.9rem;
            font-weight: 400;
            pointer-events: none;
            z-index: 1000;
            transition: 0.5s;
        }
        
        .input-container.textarea label {
            top: 1rem;
            transform: translateY(0);
        }
        
        .btn {
            padding: 0.6rem 1.3rem;
            background-color: #176d82;
            border: 2px solid #fafafa;
            font-size: 0.95rem;
            color: white;
            line-height: 1;
            border-radius: 0.25rem;
            outline: none;
            cursor: pointer;
            transition: all 0.8s ease-in-out;
            margin: 0;
            float:left;
        }
        
        .btn:hover {
            background-color: white;
            color: #176d82;
            border: 1px solid;
            border-color: #176d82;
        }
        
        .input-container span {
            position: absolute;
            top: 0;
            left: 25px;
            transform: translateY(-50%);
            font-size: 0.8rem;
            padding: 0 0.4rem;
            color: transparent;
            pointer-events: none;
            z-index: 500;
        }
        
        .input-container span:before,
        .input-container span:after {
            content: "";
            position: absolute;
            width: 10%;
            opacity: 0;
            transition: 0.3s;
            height: 5px;
            background-color: #176d8247;
            top: 50%;
            transform: translateY(-50%);
            border: #176d8247 2px solid;
        }
        
        .input-container span:before {
            left: 50%;
        }
        
        .input-container span:after {
            right: 50%;
        }
        
        .input-container.focus label {
            top: 0;
            transform: translateY(-50%);
            left: 25px;
            font-size: 0.8rem;
        }
        
        .input-container.focus span:before,
        .input-container.focus span:after {
            width: 50%;
            opacity: 1;
        }
        
        .contact-info {
            padding: 2.3rem 2.2rem;
            position: relative;
            background-color: transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
        }
        
        .contact-info .title {
            color: black;
        }
        
        .text {
            color: black;
            margin: 1.5rem 0 2rem 0;
        }
        
        .information {
            display: flex;
            color: white;
            margin: 0.7rem 0;
            align-items: center;
            font-size: 0.95rem;
            text-align: center;
        }
        
        .icon {
            width: 28px;
            margin-right: 0.7rem;
            color: #176d82;
        }
        
        .social-media {
            padding: 2rem 0 0 0;
            color: #176d82;
        }
        
     
        
        .social-icons {
            display: flex;
            margin-top: 0.5rem;
        }
        
        .social-icons a {
            width: 35px;
            height: 35px;
            border-radius: 5px;
            background: linear-gradient(45deg, #176d82, transparent);
            color: #fff;
            text-align: center;
            line-height: 35px;
            margin-right: 0.5rem;
            transition: 0.3s;
        }
        
        .social-icons a:hover {
            transform: scale(1.05);
        }
        
        .square {
            position: absolute;
            height: 400px;
            top: 50%;
            left: 50%;
            transform: translate(181%, 11%);
            opacity: 0.2;
        }
        
        @media (max-width: 850px) {
            .form {
                grid-template-columns: 1fr;
            }
            .contact-info:before {
                bottom: initial;
                top: -75px;
                right: 65px;
                transform: scale(0.95);
            }
            .contact-form:before {
                top: -13px;
                left: initial;
                right: 70px;
            }
            .square {
                transform: translate(140%, 43%);
                height: 350px;
            }
            .big-circle {
                bottom: 75%;
                transform: scale(0.9) translate(-40%, 30%);
                right: 50%;
            }
            .text {
                margin: 1rem 0 1.5rem 0;
            }
            .social-media {
                padding: 1.5rem 0 0 0;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }
            .contact-info:before {
                display: none;
            }
            .square,
            .big-circle {
                display: none;
            }
            form,
            .contact-info {
                padding: 1.7rem 1.6rem;
            }
            .text,
            .information,
            .social-media p {
                font-size: 0.8rem;
            }
            .title {
                font-size: 1.15rem;
            }
            .social-icons a {
                width: 30px;
                height: 30px;
                line-height: 30px;
            }
            .icon {
                width: 23px;
            }
            .input {
                padding: 0.45rem 1.2rem;
            }
            .btn {
                padding: 0.45rem 1.2rem;
            }
        }
        
        .credit {
            text-align: center;
            color: #fff;
        }
        
        .credit a {
            text-decoration: none;
            color: #FBAB7E;
            font-weight: bold;
        }
        
        .info_flex {
            justify-content: center;
            gap: 8px;
        }
        
    </style>
@extends("website.layouts.master")
 @section('content')

<div class="container">

    <div class="form">
        <div class="contact-info">
            <div>
                <img src="svg/logo.svg" alt="" height="100px">
            </div>

            <div class="info">
                <div class="information">

                    <p>للشكاوي والمقترحات يمكنكم التواصل بنا عبر البريد الالكتروني او عبر احد مواقع التواصل الإجتماعي</p>
                </div>
                <div class="information info_flex">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <p>enjezli.com</p>
                </div>

            </div>

            <div class="social-media">
                <p>تواصل بنا عبر :</p>
                <div class="social-icons">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>

                </div><br>
            </div>
        </div>

        <div class="contact-form">
            <span class="circle one"></span>
            <span class="circle two"></span>

            <form action="index.html" autocomplete="off">
                <h3 class="title">تواصل بنا</h3>
                <div class="input-container">
                    <input type="text" name="name" class="input" />
                    <label for="">الاسم</label>
                    <span>الاسم</span>
                </div>
                <div class="input-container">
                    <input type="email" name="email" class="input" />
                    <label for="">عنوان البريد الالكتروني</label>
                    <span>عنوان البريد الالكتروني</span>
                </div>

                <div class="input-container textarea">
                    <textarea name="message" class="input"></textarea>`
                    <label for="">الرسالة</label>
                    <span>الرسالة</span>
                </div>
                <input type="submit" value="إرسال" class="btn" />
            </form>
        </div>
    </div>
</div>
@endsection