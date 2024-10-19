@extends('layouts.app')
@section('content')
<style>
.team_list-item_img img {
    width: 276px;
    height: 337px;
    object-fit: cover;
    border-radius: 35px;
}
</style>
<header class=page>
    <div class="page_main container-fluid">
        <div class=container>
            <h1 class=page_header>Our Team</h1>
            <p class=page_text><span class="accent">CodeHarbour</span> is a dynamic team of innovative developers and
                tech enthusiasts dedicated to creating impactful software solutions. With a focus on quality and
                precision, CodeHarbour excels in developing applications that address real-world problems, leveraging
                the latest technologies and best practices to deliver exceptional results.</p>
        </div>
    </div>
</header>
<main>
    <div class="team section">
        <div class=container>
            <ul class="team_list d-flex flex-wrap justify-content-evenly">
                <div class="row mb-4">
                    <li class="style-img team_list-item col-12 col-md-6 col-xl-4 col-xxl-3" data-order="1">
                        <div class="wrapper d-flex flex-column">
                            <div class="team_list-item_img">
                                <picture>
                                    <source data-srcset="{{asset('public/img/team-members-pic/nitin.jpeg')}}" srcset="{{asset('public/img/team-members-pic/nitin.jpeg')}}" type="image/jpeg">
                                    <img class="lazy img style-img" data-src="{{asset('public/img/team-members-pic/nitin.jpeg')}}" src="{{asset('public/img/team-members-pic/nitin.jpeg')}}" alt="Richard Edwards">
                                </picture>
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center">
                                <span class="name">Nitin Kumar Vasdhani</span>
                            </div>
                        </div>
                    </li>
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/IMG_3284_Original.jpg')}} srcset={{asset('public/img/team-members-pic/IMG_3284_Original.jpg')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/IMG_3284_Original.jpg')}} src="{{asset('public/img/team-members-pic/IMG_3284_Original.jpg')}}" alt="Richard Edwards">
                                </picture>
                                
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Anurag Seervi</span> </div>
                        </div>
                    </li>
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/pranjal.jpeg')}} srcset={{asset('public/img/team-members-pic/pranjal.jpeg')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/pranjal.jpeg')}} src="{{asset('public/img/team-members-pic/pranjal.jpeg')}}" alt="Richard Edwards">
                                </picture>
                                
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Pranjal Kulshrestha</span> </div>
                        </div>
                    </li>
                    
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/Himanshu1.jpeg')}} srcset={{asset('public/img/team-members-pic/Himanshu1.jpeg')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/Himanshu1.jpeg')}} src="{{asset('public/img/team-members-pic/Himanshu1.jpeg')}}" alt="Richard Edwards">
                                </picture>
                                
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Himanshu Rai</span> </div>
                        </div>
                    </li>
                </div>
                <div class="row mb-4">
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/1713612566_b1vSz1.jpg')}} srcset={{asset('public/img/team-members-pic/1713612566_b1vSz1.jpg')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/1713612566_b1vSz1.jpg')}} src="{{asset('public/img/team-members-pic/1713612566_b1vSz1.jpg')}}" alt="Richard Edwards">
                                </picture>
                                
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Anup Kumar Yadav</span> </div>
                        </div>
                    </li>
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/bhumika.png')}} srcset={{asset('public/img/team-members-pic/bhumika.png')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/bhumika.png')}} src="{{asset('public/img/team-members-pic/bhumika.png')}}" alt="Richard Edwards">
                                </picture>
                                
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Bhumika Das</span> </div>
                        </div>
                    </li>
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/jay.jpeg')}} srcset={{asset('public/img/team-members-pic/jay.jpeg')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/jay.jpeg')}} src="{{asset('public/img/team-members-pic/jay.jpeg')}}" alt="Richard Edwards">
                                </picture>
                            </div>
                            <div class="mt-2 team_list-item_info d-flex flex-column align-items-center"><span class=name>Jay Kumar Saini</span></div>
                        </div>
                    </li>
                    <li class="team_list-item col-12 col-md-6 col-xl-4 col-xxl-3 style-img" data-order=1 >
                        <div class="wrapper d-flex flex-column">
                            <div class=team_list-item_img>
                                <picture>
                                    <source data-srcset={{asset('public/img/team-members-pic/white.png')}} srcset={{asset('public/img/team-members-pic/white.png')}} type=image/jpeg>
                                    <img class="lazy img" data-src={{asset('public/img/team-members-pic/white.png')}} src="{{asset('public/img/team-members-pic/white.png')}}" alt="Richard Edwards">
                                </picture>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</main>
@endsection