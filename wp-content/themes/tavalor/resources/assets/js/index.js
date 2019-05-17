(function($) {
  $(document).ready(function() {

    function isPresent($el, callback) {
      if ($el.length) {
        callback($el)
      }
    }

    isPresent( $('.section-single'), function($el) {
      var footHeight = $('footer').height();
      $el.css({'min-height': 'calc(100vh - ' + footHeight + 'px)'});
    });

    isPresent( $('#fullPage'), function($el) {

      if ( location.hash === '#footer_fullpage' ) {
        window.location.hash = '';
      }

      // var localize = {};

      if (localize.fullPageKey) {
        var fullPageKey = localize.fullPageKey;
      }

      isPresent( $('#footer'), function($el) {
        if ($el.height() > $(window).height() - 70) {
          $el.addClass('high-height')
        }

        $(window).resize(function() {
          if ($el.height() > $(window).height() - 70) {
            $el.addClass('high-height')
          } else {
            $el.removeClass('high-height')
          }
        });
      });

      var fullpageSectionsIds = [];

      function createFullpageNavigation() {

        const fullpageNavmenu = document.createElement('ul');
        fullpageNavmenu.setAttribute('class', 'fullpage-navmenu');
        fullpageNavmenu.setAttribute('id', 'fullpageNavmenu');

        $('#fullPage .section').each(function () {

          const sectionId = $(this).attr('id') + '_fullpage';

          fullpageSectionsIds.push(sectionId);

          const menuItem = document.createElement('li');
          const menuLink = document.createElement('a');

          menuLink.setAttribute('class', 'fullpage-navmenu__link');
          menuLink.setAttribute('href', '#' + sectionId);
          menuLink.setAttribute('data-menuanchor', sectionId);
          menuItem.appendChild(menuLink);
          fullpageNavmenu.appendChild(menuItem);
        });

        document.querySelector('.page-wrapper').appendChild(fullpageNavmenu);
      }

      function initializationFullPage() {
        $('.fullpage-navmenu').show();

        $el.fullpage({
          touchSensitivity: 5,
          navigation: false,
          anchors: fullpageSectionsIds,
          menu: '#fullpageNavmenu',
          verticalCentered: true,
          scrollingSpeed: 1000,
          scrollOverflow: true,
          scrollOverflowResetKey: fullPageKey,
          scrollOverflowReset: true,
        });
      }

      createFullpageNavigation();

      initializationFullPage();

      // parallax effect
      $('.section').each(function (index) {
        const $this = $(this);
        var height = $this.height() / 2;

        if (index === $('.section').length - 2) {
          height = $this.next().height() / 2;
          $this.find('.section-content .container').css({'transform': 'translateY(' + height + 'px)'});
          $this.find('.section-content .slick-next').css({'transform': 'translateY(-' + height + 'px)'});
        } else {
          $this.find('.section-content .container').css({'transform': 'translateY(' + height + 'px)'})
        }

      })

      $(window).resize(function() {
        $.fn.fullpage.reBuild();
      });

    });

    isPresent( $('.repeat'), function($el) {

      $el.each(function () {
        var $this = $(this);

        var animationDelay = $this.data('delay');
        var count = $this.data('count');

        for (var i = 1; i < count; i++) {
          $this.append($this.find('> image:first-child').clone(true).css({'animation-delay': animationDelay * i + 's'}));
        }
      });

    });
  });

})(jQuery);
