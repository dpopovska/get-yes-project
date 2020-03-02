(function() {
      /*
       * HOME INFO SECTION TABS
       */

      [].slice.call(document.querySelectorAll('.his-tabs-wrapper')).forEach(function(menu) {
            var menuItems = menu.querySelectorAll('.his-tab-link'),
                  setCurrent = function(ev) {
                        ev.preventDefault();

                        var item = ev.target.parentNode; // li

                        // return if already current
                        if (classie.has(item, 'his-tab-current')) {
                              return false;
                        }

                        // remove current
                        $('.'+menu.querySelector('.his-tab-current').id).addClass('hide-desc');
                        classie.remove(menu.querySelector('.his-tab-current'), 'his-tab-current');

                        // set current
                        $('.'+item.id).removeClass('hide-desc');
                        classie.add(item, 'his-tab-current');
                  };

            [].slice.call(menuItems).forEach(function(el) {
                  el.addEventListener('click', setCurrent);
            });
      });

      [].slice.call(document.querySelectorAll('.link-copy')).forEach(function(link) {
            link.setAttribute('data-clipboard-text', location.protocol + '//' + location.host + location.pathname + '#' + link.parentNode.id);
            new Clipboard(link);
            link.addEventListener('click', function() {
                  classie.add(link, 'link-copy--animate');
                  setTimeout(function() {
                        classie.remove(link, 'link-copy--animate');
                  }, 300);
            });
      });
})(window);