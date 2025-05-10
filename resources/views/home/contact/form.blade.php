@extends('home.layouts.master')
@section('styles')
    <style>
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
            text-align: right;
        }

        .form-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 3px;
            background: #0d6efd;
        }

        .form-floating label {
            padding-right: 35px;
            text-align: right;
        }

        .form-floating .bi {
            position: absolute;
            top: 18px;
            right: 12px;
            font-size: 1.2rem;
            color: #6c757d;
        }

        .btn-submit {
            padding: 10px 30px;
            font-weight: 600;
        }

        textarea {
            text-align: right;
        }
    </style>
@endsection
@section('content')
    <div class="px-5 home_services">
        <div class="p-5 about_title text-white">اتصل بنا</div>
    </div>
    <section class="home_about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 ml-xl-auto col-md-8 col-12 mx-auto wow zoomIn mt-5">
                    <div class="container my-5">
                        <div class="contact-form bg-white">
                            <h2 class="form-title">اتصل بنا</h2>
                            <form method="POST" action="{{ route('contact.submit') }}" id="contactForm" novalidate>
                                @csrf
                                <!-- Name Field -->
                                <div class="form-floating mb-4 position-relative">
                                    <i class="bi bi-person"></i>
                                    <input type="text" class="form-control pe-4" id="name" name="name" placeholder="الاسم الكامل" required>
                                    <label for="name" class="pe-4">الاسم الكامل</label>
                                    <div class="invalid-feedback text-end">
                                        الرجاء إدخال الاسم
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="form-floating mb-4 position-relative">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email" class="form-control pe-4" id="email" name="email" placeholder="البريد الإلكتروني" required>
                                    <label for="email" class="pe-4">البريد الإلكتروني</label>
                                    <div class="invalid-feedback text-end">
                                        الرجاء إدخال بريد إلكتروني صحيح
                                    </div>
                                </div>

                                <!-- Message Field -->
                                <div class="mb-4">
                                    <div class="form-floating position-relative">
                                        <i class="bi bi-chat-left-text"></i>
                                        <textarea class="form-control pe-4" id="body" name="body" placeholder="الرسالة" style="height: 150px" required></textarea>
                                        <label for="body" class="pe-4">الرسالة</label>
                                    </div>
                                    <div class="invalid-feedback text-end">
                                        الرجاء كتابة الرسالة
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-submit" type="submit">
                                        <i class="bi bi-send me-2"></i> إرسال الرسالة
                                    </button>
                                </div>
                            </form>

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success mt-4 text-end">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Error Message -->
                            @if ($errors->any())
                                <div class="alert alert-danger mt-4 text-end">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-xl-5 ml-xl-auto col-md-8 col-12 mx-auto wow zoomIn mt-5">
                    <h1 class="text-secondary mt-5">نحن هنا لمساعدتك!</h1>
                    <p class="py-5">
                        نسعد بتواصلك معنا! سواء كان لديك استفسار، اقتراح، أو شكوى، فريق الدعم لديك جاهز لمساعدتك على الفور. املأ النموذج أدناه وسنرد عليك في أسرع وقت ممكن.
                    </p>

                    <small>
                        "نقدّر ثقتك بنا! فريقنا يعمل جاهداً لتقديم أفضل تجربة رعاية صحية لك. شكراً لاختياركنا.
                    </small>
                </div>

                <!--end col-->
            </div>
            <!--end row -->
        </div>
        <!--end container-->
    </section>
@endsection
@section('scripts')
    <script>
        (function() {
            'use strict';

            const form = document.getElementById('contactForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        })();
    </script>
@endsection
