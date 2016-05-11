(function(){

var presentation = {

    albums: [],

	init: function(){
		this.cacheDOM();
		this.bindEvents();

        this.hideAlerts();
        this.loadAlbums();
	},

	cacheDOM: function(){
		this.$window   = $(window);
		this.$masthead = $("#masthead");

        this.$more_btn = $("#more");

        this.gallery_wrapper  = document.querySelectorAll('.pswp')[0];
        this.$albums          = $(".section.portofolio").find(".album");

        this.$admin_container = $(".admin");
        this.$album_images    = this.$admin_container.find(".images .image");
        this.$alerts          = $(".alert");
        this.$delete_btns     = $(".delete-item");

        this.$menu_wrapper         = $(".masthead-nav");
        this.$menu_items           = this.$menu_wrapper.find("li");
        this.$menu_item_services   = this.$menu_wrapper.find(".services");
        this.$menu_item_portofolio = this.$menu_wrapper.find(".portofolio");
        this.$menu_item_team       = this.$menu_wrapper.find(".team");
        this.$menu_item_contact    = this.$menu_wrapper.find(".contact");

        this.modal = {};
        this.modal.$box   = $("#myModal");
        this.modal.$title = this.modal.$box.find(".modal-title");
        this.modal.$body  = this.modal.$box.find(".modal-body");

        this.$services_wrapper   = $("#services-wrapper");
        this.$portofolio_wrapper = $("#portofolio-wrapper");
        this.$team_wrapper       = $("#team-wrapper");
        this.$contact_wrapper    = $("#contact-wrapper");

        this.contact = {};
        this.contact.$name    = $("#inputName");
        this.contact.$email   = $("#inputEmail");
        this.contact.$phone   = $("#inputPhone");
        this.contact.$message = $("#inputMessage");
        this.contact.$btn     = $("#contactBtn");
	},

	bindEvents: function(){
		this.$window.scroll(this.animateHeader.bind(this));
		this.$window.load(this.loadMap.bind(this));

        this.$albums.click(this.openAlbum.bind(this));

        this.$album_images.hover(this.showDeleteBtns, this.hideDeleteBtns);
        this.$delete_btns.click(this.confirmDelete);

        this.$more_btn.click(this.slideToContent);

        this.$menu_items.click(this.slideToContent);
        this.contact.$btn.click(this.sendMessage.bind(this));
	},

	animateHeader: function(){
		var top = this.$window.scrollTop();

        // change header style
		if (top < 10) {
			this.$masthead.removeClass("scrolled")
		} else {
			this.$masthead.addClass("scrolled");
		}

        // update menu items
        if (top < this.$services_wrapper.offset().top - 300) {
            if (this.$menu_item_services.hasClass("active")) {
                presentation.$menu_items.removeClass("active");
            }
        }   
        else if (top > this.$services_wrapper.offset().top - 300 && top < this.$portofolio_wrapper.offset().top - 300) {
            if (!this.$menu_item_services.hasClass("active")) {
                presentation.$menu_items.removeClass("active");
                this.$menu_item_services.addClass("active");
            }
        }
        else if (top > this.$portofolio_wrapper.offset().top - 300 && top < this.$team_wrapper.offset().top - 300) {
            if (!this.$menu_item_portofolio.hasClass("active")) {
                presentation.$menu_items.removeClass("active");
                this.$menu_item_portofolio.addClass("active");
            }
        }
        else if (top > this.$team_wrapper.offset().top - 300 && top < this.$contact_wrapper.offset().top - 300) {
            if (!this.$menu_item_team.hasClass("active")) {
                presentation.$menu_items.removeClass("active");
                this.$menu_item_team.addClass("active");
            }
        }
        else if (top > this.$contact_wrapper.offset().top - 300) {
            if (!this.$menu_item_contact.hasClass("active")) {
                presentation.$menu_items.removeClass("active");
                this.$menu_item_contact.addClass("active");
            }
        }
	},

    slideToContent: function(e){
        e.preventDefault();
        var to = $(this).data("to");
        var $el = presentation["$"+to+"_wrapper"];

        presentation.$menu_items.removeClass("active");
        $(this).addClass("active");

        $("html, body").animate({
            scrollTop: $el.offset().top - 70
        }, 1000);
    },

    displayModal: function(options){
        this.modal.$title.html(options.title);
        this.modal.$body.html(options.body);

        console.log(this.modal.$box);
        this.modal.$box.modal('show');
    },

    sendMessage: function(){
        if (this.validateMessage()) {
            var data = {
                name: this.contact.$name.val(),
                phone: this.contact.$phone.val(),
                email: this.contact.$email.val(),
                message: this.contact.$message.val()
            };

            $.ajax({
                type: "POST",
                url: "./api/contact",
                data: data,
                dataType: "json",
                success: function(response) {
                    presentation.displayModal({
                        title: "Message Sent",
                        body: "We will check your message as soon as possible."
                    });

                    presentation.contact.$name.val("");
                    presentation.contact.$email.val("");
                    presentation.contact.$phone.val("");
                    presentation.contact.$message.val("");
                }
            });
        }
    },

    validateMessage: function(){
        var valid = true;

        if (this.contact.$name.val().length == 0) {
            valid = false;
            this.contact.$name.addClass("error");
        } else {
            this.contact.$name.removeClass("error");
        }

        if (this.contact.$email.val().length == 0) {
            valid = false;
            this.contact.$email.addClass("error");
        } else {
            this.contact.$email.removeClass("error");
        }

        if (this.contact.$phone.val().length == 0) {
            valid = false;
            this.contact.$phone.addClass("error");
        } else {
            this.contact.$phone.removeClass("error");
        }

        if (this.contact.$message.val().length == 0) {
            valid = false;
            this.contact.$message.addClass("error");
        } else {
            this.contact.$message.removeClass("error");
        }

        return valid;
    },

    confirmDelete: function(e){
        e.preventDefault();
        var url = $(this).attr("href");

        if (confirm("Are you sure you want to delete this?")) {
            window.location = url;
        }
    },

    showDeleteBtns: function(){
        $(this).addClass("show-delete-btn");
    },

    hideDeleteBtns: function(){
        $(this).removeClass("show-delete-btn");
    },

    hideAlerts: function(){
        var $alerts = this.$alerts;

        setTimeout(function(){
            $alerts.slideUp(500);
        }, 1500);
    },

    openAlbum: function(e){
        var index = $(e.currentTarget).data("index");
        
        if (index in this.albums) {
            var ps = new PhotoSwipe(this.gallery_wrapper, PhotoSwipeUI_Default, this.albums[index]);
            ps.init();
        }
    },

    setAlbums: function(albums){

        for (var i in albums) {
            var index          = albums[i].id;
            this.albums[index] = [];

            for (var j in albums[i].images) {
                var image = albums[i].images[j];

                image.src = image.url;
                image.w   = image.width;
                image.h   = image.height;

                this.albums[index][j] = image;
            }
        }
    },

    loadAlbums: function(){
        $.ajax({
            type: "GET",
            url: "./api/albums",
            data: {},
            dataType: "json",
            success: function(response) {
                presentation.setAlbums(response.albums);
            }
        });
    },

	loadMap: function(){

        if (typeof google == "undefined") {
            return;
        }

		// set your google maps parameters
        var latitude = 44.37021, //If you unable to find latitude and longitude of your address. Please visit http://www.latlong.net/convert-address-to-lat-long.html you can easily generate.
            longitude = 26.1459029,
            map_zoom = 14; /* ZOOM SETTING */

        // google map custom marker icon
        var marker_url = './images/marker.png';
        
        // we define here the style of the map
        var style = [{
            "stylers": [{
                "hue": "#00aaff"
            }, {
                "saturation": -100
            }, {
                "gamma": 2.15
            }, {
                "lightness": 12
            }]
        }];

        // set google map options
        var map_options = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: map_zoom,
            panControl: true,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            styles: style
        };
        
        // inizialize the map
        var map = new google.maps.Map(document.getElementById('map-container'), map_options);
    
        //add a custom marker to the map				
        // var marker = new google.maps.Marker({
        //     position: new google.maps.LatLng(latitude, longitude),
        //     map: map,
        //     visible: true,
        //     icon: marker_url
        // });
	}
}

presentation.init();
})();
