@extends('layouts.app')
@section('title')
Events
@endsection
@section('css')
<style>
    /* .event-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-column-gap: 5px;
        grid-row-gap: 5px; 
    }
    .hovereffect {
    width: 77%;
    height: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}
.hovereffect img {
    width:140px;
    height:120px;
    
}
.hovereffect .overlay {
    width: 100%;
    position: absolute;
    overflow: hidden;
    left: 0;
	top: auto;
	bottom: 0;
	padding: 1em;
	height: 4.75em;
	background: #79FAC4;
	color: #3c4a50;
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	visibility: hidden;

}

.hovereffect img {
    display: block;
    position: relative;
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
}

.hovereffect:hover img {
-webkit-transform: translate3d(0,-10%,0);
	transform: translate3d(0,-10%,0);
}

.hovereffect h6 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    padding: 10px;
    background: rgba(0, 0, 0, 0.6);
	float: left;
	margin: 0px;
	display: inline-block;
}

.hovereffect a.info {
    display: inline-block;
    text-decoration: none;
    padding: 7px 14px;
    text-transform: uppercase;
	color: #fff;
	border: 1px solid #fff;
	margin: 50px 0 0 0;
	background-color: transparent;
}
.hovereffect a.info:hover {
    box-shadow: 0 0 5px #fff;
}


.hovereffect p.icon-links a {
	float: right;
	color: #3c4a50;
	font-size: 1.4em;
}

.hovereffect:hover p.icon-links a:hover,
.hovereffect:hover p.icon-links a:focus {
	color: #252d31;
}

.hovereffect h6,
.hovereffect p.icon-links a {
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
	-webkit-transform: translate3d(0,200%,0);
	transform: translate3d(0,200%,0);
	visibility: visible;
}

.hovereffect p.icon-links a span:before {
	display: inline-block;
	padding: 8px 10px;
	speak: none;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}


.hovereffect:hover .overlay,
.hovereffect:hover h6,
.hovereffect:hover p.icon-links a {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

.hovereffect:hover h6 {
	-webkit-transition-delay: 0.05s;
	transition-delay: 0.05s;
}

.hovereffect:hover p.icon-links a:nth-child(3) {
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
}

.hovereffect:hover p.icon-links a:nth-child(2) {
	-webkit-transition-delay: 0.15s;
	transition-delay: 0.15s;
}

.hovereffect:hover p.icon-links a:first-child {
	-webkit-transition-delay: 0.2s;
	transition-delay: 0.2s;
} */


/* body {
  font-family: 'Inconsolata', monospace;
  margin: 0;
}
button {
  cursor: pointer;
}
#portfolio {
  width: 100%;
  min-height: 70vh;
  background: #ffffff;
  position: relative;
  display: grid;
  grid-template-columns: repeat(6, minmax(100px, 1fr));
  grid-template-rows: 1fr 1fr;
  grid-gap: 8px;
}
.project {
  position: relative;
  background: #F2DAD7;
  overflow: hidden;
  cursor:zoom-in;
}
.project img {
  position: absolute;
  opacity: 0.9;
}
.project p {
  position: absolute;
  text-align: center;
  width: 100%;
  padding: 1em 0;
  text-transform: uppercase;
  letter-spacing: 2px;
  z-index: 3;
}
.project .grid__title {
  position: absolute;
  width: 100%;
  text-align: center;
  white-space: nowrap;
  bottom: 0;
  font-weight: 100;
  font-size: 0.8em;
  z-index: 3;
  text-transform: uppercase;
  color: #474545;
  letter-spacing: 2px;
}
.project:hover .grid__overlay {
  transform: translateY(0%);
}
.grid__overlay {
  background: rgba(229, 182, 177, 0.9);
  height: 100%;
  grid-column: 1 / -1;
  grid-row: 1 / -1;
  position: relative;
  display: grid;
  justify-items: center;
  align-items: center;
  transform: translateY(101%);
  transition: all 0.3s ease-in-out;
}
.grid__overlay button {
  background: none;
  outline: none;
  font-weight: 100;
  letter-spacing: 2px;
  border: 1px solid #ffffff;
  color: #ffffff;
  text-transform: uppercase;
  padding: 10px;
}
.grid__overlay button:hover {
  transition: all 0.3s ease-in-out;
  background: #ffffff;
  color: #D1A39E;
  transform: scale(1.05);
}
.overlay {
  position: fixed;
  background: rgba(71, 69, 69, 0.7);
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: none;
  z-index: 3;
}
.overlay.open {
  display: grid;
  align-items: center;
  justify-items: center;
  grid-gap:20px;
}
.overlay__inner {
  background: #ffffff;
  width: 700px;
  padding: 20px;
  position: relative;
  opacity: 1;
}
.close {
  position: absolute;
  top: 3px;
  right: 10px;
  background: none;
  outline: 0;
  color: #474545;
  border: 0;
  text-transform: uppercase;
  letter-spacing: 2px;
}
.close:hover {
  color: #D1A39E;
}
.project__image {
  margin-left: -50%;
}

.project img:hover {
    transform: scale(1.2);
} */
.container1 {
  display: flex;
  width: 100%;
  padding: 4% 2%;
  box-sizing: border-box;
  height: 50%;
}

.box {
  flex: 1;
  overflow: hidden;
  transition: .5s;
  margin: 0 2%;
  box-shadow: 0 20px 30px rgba(0,0,0,.1);
  line-height: 0;
}

.box > img {
  width: 100%;
  height: calc(100% - 5vh);
  object-fit: cover; 
  transition: .5s;
}

.box > span {
  font-size: 3.8vh;
  display: block;
  text-align: center;
  height: 5vh;
  line-height: 2.6;
}

.box:hover { flex: 1 1 50%; }
.box:hover > img {
  width: 100%;
  height: 100%;
}
 
 
</style>
@endsection
@section('content')

    <section class="conact admin">
        <div class="container">
            <div class="services-wrap">
                <div class="row">
                        <div class="col-md-12">
                            <h3>{{$event->title}}</h3><br>
                            <p>{!! $event->description !!}</p>
                        </div>
                        <!-- Event section -->
                        <div class="container1">
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x800" style="height:150px">
                                <!-- <span>lorem</span> -->
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x802" style="height:150px">
                                
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x804" style="height:150px">
                                
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x806" style="height:150px">
                                
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x806" style="height:150px">
                                
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x806" style="height:150px">
                                
                            </div>
                            <div class="box">
                                <img src="https://source.unsplash.com/1000x806" style="height:150px">
                                
                            </div>
                        </div>
                        
                        <!-- <section id="portfolio">
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1519211975560-4ca611f5a72a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ae34625b8db390fb2b784800d76d225&auto=format&fit=crop&w=700&q=80" />
                            <p></p>
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1521104955835-ba91c70d6443?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38cdeda7d073c4b6d47a5776f184cba9&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e5a31d03ddee66863a599421f792e07b&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1472437774355-71ab6752b434?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=dd4d735954f33290fbf984e4eb7abe32&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7c5008952226f48ed4bf5d3ea64ff545&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1509395176047-4a66953fd231?ixlib=rb-0.3.5&s=a4b3dc4bee43da458f6aa5c05be6bfc4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1481762554390-ff5562748bdf?ixlib=rb-0.3.5&s=1b7f850b7f8f702e237b0f81c0ec0bf5&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div> -->
                            <!-- <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div>
                            <div class="project">
                            <img class="project__image" src="https://images.unsplash.com/photo-1463620695885-8a91d87c53d0?ixlib=rb-0.3.5&s=e5bf2f64858b8abe2a386b0c6df594e4&auto=format&fit=crop&w=700&q=80" />
                            
                            <div class="grid__overlay">
                                <button class="viewbutton">view more</button>
                            </div>
                            </div> -->
                            <!-- <div class="overlay">
                            <div class="overlay__inner">
                                <button class="close">close X</button>
                                <img>
                            </div>
                            </div> -->
                        </section>
                        
                </div>
            </div>
          
        </div>
        
    </section>
@endsection
@section('scripts')
@endsection
