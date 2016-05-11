<!DOCTYPE html>
<html>
    <head>
        <title>AndMar Studio</title>

        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <meta name="description" content="AndMarStudio Bucuresti - Studio Foto">

        <link rel="icon" type="image/x-icon" href="{{ url('images/favicon.ico') }}"> 
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url('css/lib.css?v=1.1.0') }}">
        <link rel="stylesheet" href="{{ url(elixir('css/app.css')) }}">
    </head>

    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=692626504143636";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Root element of PhotoSwipe. Must have class pswp. -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. 
                 It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides. 
                    PhotoSwipe keeps only 3 of them in the DOM to save memory.
                    Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>

                </div>

            </div>

        </div>

        <div class="cover-wrapper">
            <div class="cover-bg"></div>
          	<div class="cover-wrapper-inner">

            	<div class="cover-container">

              		<div id="masthead" class="masthead clearfix">
                		<div class="inner">
                  			<h3 class="masthead-brand">AndMar Studio</h3>
                  			<nav>
                    			<ul class="nav masthead-nav">
                      				<li data-to="services" class="services"><a href="#">Servicii</a></li>
                                    <li data-to="portofolio" class="portofolio"><a href="#">Portofoliu</a></li>
                                    <li data-to="team" class="team"><a href="#">Agenție</a></li>
                      				<li data-to="contact" class="contact"><a href="#">Contact</a></li>
                    			</ul>
                  			</nav>
                		</div>
              		</div>

              		<div class="inner cover">
                		<h1 class="cover-heading">Acuratețe, seriozitate și calitate.</h1>
                		<h2>AndMar Studio</h2>
                		<p class="learn-more lead">
                  			<a id="more" data-to="services" href="#" class="btn btn-lg btn-primary">Află mai multe</a>
                		</p>
              		</div>

            	</div>
            </div>
        </div>
        <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
            <polygon points="100,0 0,100 100,100" class="white" />
        </svg>

        <div id="services-wrapper" class="section services">
            <div class="inner">
                <div class="title">Servicii</div>
                <div class="sub-title">Serviciile oferite de noi acoperă o gamă completă.</div>
                <div class="content">
                    <div class="row">
                        <div class="service col-sm-3">
                            <div class="image glyphicon glyphicon-camera"></div>
                            <div class="title">Foto</div>
                            <div class="description">Oferim servicii profesioniste de fotografie, folosind cele mai bune echipamente de pe piață.</div>
                        </div>
                        <div class="service col-sm-3">
                            <div class="image glyphicon glyphicon-facetime-video"></div>
                            <div class="title">Video</div>
                            <div class="description">Pe langă fotografie oferim servicii profesioniste video.</div>
                        </div>
                        <div class="service col-sm-3">
                            <div class="image glyphicon glyphicon-plane"></div>
                            <div class="title">Dronă</div>
                            <div class="description">Toate aceste servicii sunt completate de filmări cu drona, pentru o experiență de neuitat.</div>
                        </div>
                        <div class="service col-sm-3">
                            <div class="image glyphicon glyphicon-th-large"></div>
                            <div class="title">Închirieri</div>
                            <div class="description">Poți închiria echipamentele noastre pentru a-ți transforma viziunea în realitate.</div>
                        </div>
                    </div>    
                </div>
            </div>
            <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                <polygon points="100,0 0,100 100,100" />
            </svg>
        </div>

        <div id="portofolio-wrapper" class="section portofolio">
            <div class="inner">
                <div class="title">Portofoliu</div>
                <div class="sub-title">Vizualizează proiectele noastre.</div>
                <div class="content">
                    @foreach ($albums as $a)
                        <div class="album" data-index="{{ $a->id }}">
                            <div class="image" style="background-image: url('{{ $a->getCoverURL() }}')"></div>
                            <div class="title">{{ $a->name }}</div>
                            <div class="description">{{ $a->description }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                <polygon points="100,0 0,100 100,100" />
            </svg>
        </div>

        <div id="team-wrapper" class="section team">
            <div class="inner">
                <div class="title">Agenția</div>
                <div class="sub-title">Echipa AndMar Studio.</div>
                <div class="content">
                    <div class="member col-sm-3">
                        <div class="image">
                            <img src="https://www.element14.com/community/images/jive-profile-default-portrait.png" alt="" class="img-circle" />
                        </div>
                        <div class="name">Andrei Lupușoară</div>
                        <!-- <div class="description">Lead Designer</div> -->
                        <div class="contact">
                            <div class="item fb ion-social-facebook"></div>
                            <div class="item tw ion-social-twitter"></div>
                            <div class="item email ion-email"></div>
                        </div>
                    </div>    
                    <div class="member col-sm-3">
                        <div class="image">
                            <img src="https://www.element14.com/community/images/jive-profile-default-portrait.png" alt="" class="img-circle" />
                        </div>
                        <div class="name">Maria Conache</div>
                        <!-- <div class="description">Lead Designer</div> -->
                        <div class="contact">
                            <div class="item fb ion-social-facebook"></div>
                            <div class="item tw ion-social-twitter"></div>
                            <div class="item email ion-email"></div>
                        </div>
                    </div>    
                    <div class="member col-sm-3">
                        <div class="image">
                            <img src="https://www.element14.com/community/images/jive-profile-default-portrait.png" alt="" class="img-circle" />
                        </div>
                        <div class="name">Roberto Stan</div>
                        <!-- <div class="description">Lead Designer</div> -->
                        <div class="contact">
                            <div class="item fb ion-social-facebook"></div>
                            <div class="item tw ion-social-twitter"></div>
                            <div class="item email ion-email"></div>
                        </div>
                    </div>   
                    <div class="member col-sm-3">
                        <div class="image">
                            <img src="https://www.element14.com/community/images/jive-profile-default-portrait.png" alt="" class="img-circle" />
                        </div>
                        <div class="name">Adrian Aramă</div>
                        <!-- <div class="description">Lead Designer</div> -->
                        <div class="contact">
                            <div class="item fb ion-social-facebook"></div>
                            <div class="item tw ion-social-twitter"></div>
                            <div class="item email ion-email"></div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class="section quote">
            <div class="bg-color">
                <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <polygon points="100,0 0,100 0,0" class="top"/>
                </svg>
                <div class="inner">
                    <div class="title">Atunci când <span class="color">pasiunea</span> pentru <span class="color">fotografie</span> întâlneşte profesionalismul.</div>
                </div>
                <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <polygon points="100,0 0,100 100,100" class="bottom"/>
                </svg>
            </div>
        </div>

        <div id="contact-wrapper" class="section contact">
            <div class="inner">
                <div class="title">Contact</div>
                <div class="sub-title">
                    <div class="item">
                        <span class="text">+40 744 262 490</span>
                    </div>
                    <div class="item">
                        <span class="text">andmarstudio@yahoo.com</span>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-sm-6">
                            <form>
                                <div class="form-group">
                                    <label for="inputName">Nume</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Numele tau">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Adresa ta de email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Telefon</label>
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Numarul tau de telefon">
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form>
                                <div class="form-group">
                                    <label for="inputMessage">Mesaj</label>
                                    <textarea class="form-control" id="inputMessage" placeholder="Mesajul tau"></textarea>
                                </div>
                                <div id="contactBtn" class="btn btn-primary btn-block btn-lg">Trimite</div>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class="section map">
            <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                <polygon points="100,0 0,100 0,0" class="top"/>
            </svg>
            <div id="map-container"></div>
            <svg class="oblique" height="100" width="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
                <polygon points="100,0 0,100 100,100" class="bottom"/>
            </svg>
        </div>

        <div class="section footer">
            <div class="inner">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title">Contact</div>
                        <div class="description">Pentru a ne contacta puteți folosi formularul din secțiunea contact, dar și detaliile de mai jos.</div>
                        <div class="details">
                            <div class="item">
                                <span class="icon ion-ios-telephone"></span>
                                <span class="text">+40 744 262 490</span>
                            </div>
                            <div class="item">
                                <span class="icon ion-email"></span>
                                <span class="text">andmarstudio@yahoo.com</span>
                            </div>
                            <!-- <div class="item">
                                <span class="icon ion-android-pin"></span>
                                <span class="text">Popesti-Leordeni, str. Amurgului nr. 47.</span>
                            </div> -->
                            <div class="item">
                                <span class="icon ion-android-time"></span>
                                <span class="text">Luni - Vineri, 08:30 - 17:00</span>
                            </div>
                        </div>
                        <div class="social">
                            <div class="item fb ion-social-facebook"></div>
                            <div class="item tw ion-social-twitter"></div>
                            <div class="item pin ion-social-pinterest"></div>
                            <div class="item yb ion-social-youtube"></div>
                            <div class="item gp ion-social-googleplus"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="title">Despre Noi</div>
                        <div class="description">
                            Acuratețe, seriozitate și calitate sunt primele trei cuvinte pe care am putea să le folosim când vine vorba de AndMar Studio, iar viziunea noastră tânără oferă o notă de optimism și curaj tuturor clentilor noștrii.
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="title">Ei deja au dat like</div>
                        <div class="description">
                            <div class="fb-page" data-href="https://www.facebook.com/AndMar-Studio-Photography-925919270827598" data-height="275" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <img src="{{ url('images/sigla2.png') }}" alt="" />
            <p>Copyright &copy; 2015-2016 <a href="#"> ANDMARSTUDIO.</a></p>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="{{ url('js/lib.js?v=1.1.0') }}"></script>
        <script type="text/javascript" src="{{ url(elixir('js/app.js')) }}"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-75066213-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
