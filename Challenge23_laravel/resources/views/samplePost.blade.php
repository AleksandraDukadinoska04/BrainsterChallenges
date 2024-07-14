@extends('website.layout.app')

@section('title', 'Sample Post')
@section('backgroud', 'backgroudImage4')
@section('h1', 'Man must explore, and this is exploration at its greatest')
@section('desc', 'Problems look mighty small from 150 miles up')
@section('desc2', 'Posted by Start Boostrap on August 24, 2018')
@section('class1', 'text-left')
@section('class2', 'header')
@section('class3', 'fs-3')

@section('samplePost')

<main>
    <div class="container w-30 mx-auto my-5 p-0">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis eum facilis molestiae accusamus id tenetur, earum recusandae? Culpa distinctio nulla quia saepe, nisi tenetur amet modi pariatur odit iste totam.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores, quasi alias veritatis expedita temporibus deleniti itaque esse, nam, voluptatem nobis nulla quos beatae magnam.</p>
        <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora, laudantium eveniet culpa hic dolore tempore dolorem impedit natus delectus iste debitis eaque necessitatibus, eius magni provident, similique ipsum commodi! Dicta voluptate reprehenderit ratione voluptas cumque molestiae quibusdam similique deserunt at reiciendis amet omnis doloremque nulla, libero nam. Repudiandae, laborum eum.</p>
        <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis aspernatur similique officia, maxime est laudantium sit ullam nemo sint voluptatibus!</p>
        <br>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore repudiandae quae, illum aliquid vel alias deleniti at fugiat architecto ut quas explicabo hic eaque, officia neque vitae, culpa saepe eos maxime consectetur labore debitis. Ipsum.</p>
        <br><br>
        <h3 class="fw-bold">The Final Frontier</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum porro accusamus illum consectetur, voluptatibus consequatur obcaecati nobis repellendus quod iusto, reprehenderit quae. Sunt fugiat facilis, cumque repellendus ad laudantium at!</p>
        <br>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit autem quasi dolorem perferendis harum deserunt, saepe laudantium, enim repellendus esse deleniti maxime unde ea recusandae!</p>
        <br>
        <p class="fst-italic text-body-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione quisquam sed magni perspiciatis quidem nesciunt dolorum, iste rem quasi, ducimus consequuntur neque id aut tempora quae laboriosam distinctio eligendi perferendis assumenda. Corporis rem atque voluptates sequi commodi asperiores vitae labore cumque possimus. Totam quas nulla expedita quo sint labore. Facilis!</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae distinctio aut iusto ex doloribus optio ut accusantium aspernatur voluptatem facere quis cum odio ipsa expedita, soluta repellendus fugiat eius porro.</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate repudiandae aperiam amet laborum doloremque dolores voluptate molestiae error rerum voluptas libero cumque neque repellat labore sunt, fugit officiis qui sequi tempore. Aspernatur natus ea rem aperiam fugiat nulla, corporis sed.</p>
        <br><br>
        <h3 class="fw-bold">Reaching for the stars</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi non consequuntur consequatur distinctio quam incidunt fugiat quaerat, sit, ut ad sunt illo voluptatum unde iste labore, minima deserunt earum nulla. Aliquid obcaecati quos placeat hic reprehenderit libero nam maiores ad, sunt deleniti repudiandae eius magni eos corporis nobis voluptatibus laudantium?</p>
        <br>
        <figure>
            <img src="{{ asset('images/blog-image.jpg') }}" alt="space">
            <figcaption>
                <small class="text-body-secondary fst-italic d-block text-center">Lorem ipsum dolor sit amet consectetur adipisicing.</small>
            </figcaption>
        </figure>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab modi ipsa placeat enim consectetur tempore ea ratione neque dolores iusto, voluptas ut soluta autem debitis aliquam praesentium! Ad, dolor sit?</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, magnam similique error id, reiciendis, doloribus harum reprehenderit ipsum impedit perferendis iste cum! Facilis reiciendis ad id qui, temporibus pariatur velit consequuntur a corrupti earum aut neque harum unde accusantium ipsum cum vero omnis natus! Similique assumenda consequuntur harum nostrum repudiandae.</p>
        <br><br>
        <p>Lorem dolor <span class="text-decoration-underline">consectetur adipisicing</span> elit. Simili,<span class="text-decoration-underline">necessitatibus</span>.</p>
    </div>
    <hr class="mx-3">
</main>

@endsection