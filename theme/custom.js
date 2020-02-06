jQuery(function ($) {
// anchor target blank
    var location = window.location;
    var site_url = location.protocol + "//" + location.hostname;
    $('a').each(function () {

        var a = new RegExp('/' + window.location.host + '/');
        var check_href = $(this).attr('href');

        if (Object.prototype.toString.call(check_href) == '[object String]') {

            if (a.test(this.href) && $(this).attr('href').match("^" + site_url + "")) {
                $(this).attr('data-internal', '1');
            }

            if ((!a.test(this.href) && $(this).attr('href').match('^http')) || (check_href.indexOf('https://www.linkedin.com/shareArticle?') != -1 || check_href.indexOf('https://www.facebook.com/sharer/sharer.php') != -1 || check_href.indexOf('https://twitter.com/intent/tweet?url=') != -1 || check_href.indexOf('http://www.facebook.com/sharer.php?u=') != -1 || check_href.indexOf('https://twitter.com/share?url=') != -1)) {
                $(this).attr('data-external', '1');
            }

            if (check_href.indexOf('tel:') != -1 || check_href.indexOf('mailto:') != -1 || check_href.indexOf('sms:') != -1 || check_href == '#' || check_href == 'javascript:void(0);') {
                $(this).attr('data-other', '1');
            }
            var fileExtension = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'epub', 'odp', 'ods', 'txt', 'rtf', 'vcf$'];
            if ($.inArray($(this).attr('href').split('.').pop().toLowerCase(), fileExtension) > -1) {
                $(this).attr('data-file', '1');
            }

            if (($(this).data('external') == '1' || $(this).data('file') == '1') && $(this).attr('target') != '_blank') {
                $(this).attr('target', '_blank');
            }

            if ($(this).data('external') == '1' && !$(this).hasClass('dofollow')) {
                $(this).attr('rel', 'nofollow');
            }

        }

    });
    if ($('form').length > 0) {
        $('form').find('a').each(function () {
            if (Object.prototype.toString.call($(this).attr('href')) == '[object String]') {
                if ($(this).attr('href').indexOf('Disclaimer.shtml') != -1 || $(this).attr('href').indexOf('Privacy-Policy.shtml') != -1) {
                    $(this).attr('data-terms', '1');
                    if ($(this).data('terms') == '1' && $(this).attr('target') != '_blank') {
                        $(this).attr('target', '_blank');
                    }
                }
            }
        });
    }
// anchor target blank new

// remove <br> & set title
    $('body a').each(function () {
        if (!$(this).is("[title]")) {
            var remove_br = $.trim($(this).text().replace(/\n/g, " "));
            $(this).attr("title", remove_br);
        }
    });
// remove <br> & set title

// img slt tag form parent anchor
    $('body a img').each(function () {
        if (!$(this).is("[alt]")) {
            var anchor_title = $(this).closest('a').attr("title");
            ;
            $(this).attr("alt", anchor_title);
        }
    });
// img slt tag form parent anchor

// javascript:void(0)
    $("a[href$=\'#\']").each(function () {
        $(this).attr("href", "javascript:void(0);")
    });
// javascript:void(0)

// tel
    $('body a[href^="tel:"]').each(function () {
        if (!$(this).is("[onclick]")) {

            // get from href
            var get_href_tel = $(this).attr('href').replace('tel:', '');
            var get_href_tel = $.trim(get_href_tel);
            var parentheses_remove = get_href_tel.replace(/\(|\)/g, "");
            var replace_space_with_dash = parentheses_remove.replace(/\s/g, "-");
            var tel_href = replace_space_with_dash;
            //var hrefval = "gtag('event', 'Clicked to Call " + tel_href + "', { 'event_category' : 'Phone Number (" + tel_href + ")' });";
            var hrefval = "ga('send', 'event', { eventCategory: 'Phone Number (" + tel_href + ")', eventAction: 'Clicked to Call " + tel_href + "'});";
            // get from href

            // get from value
            var get_number = $(this).text();
            var get_number = $.trim(get_number);
            var parentheses_remove = get_number.replace(/\(|\)/g, "");
            var replace_space_with_dash = parentheses_remove.replace(/\s/g, "-");
            var tel_val = replace_space_with_dash;
            //var tagval = "gtag('event', 'Clicked to Call " + tel_val + "', { 'event_category' : 'Phone Number (" + tel_val + ")' });";
            var tagval = "ga('send', 'event', { eventCategory: 'Phone Number (" + tel_val + ")', eventAction: 'Clicked to Call " + tel_val + "'});";
            var remove_dash = get_number.replace(/-|[(|, )]/g, "");
            // get from value

            if ($.isNumeric(remove_dash)) {
                var is_number = 'is number';
                $(this).attr("onclick", tagval);
            } else {
                $(this).attr("onclick", hrefval);
                $(this).attr("title", tel_href);
            }
            //console.log(tel_href);
        }
    });
// tel

// next prev
    $('body a').each(function () {
        $('.nav-links a.prev.page-numbers').attr("title", "Previous");
        $('.nav-links a.next.page-numbers').attr("title", "Next");
    });
// next prev

// count LI
    if ($('.sec1, .sec2').length > 0) {
        (function ($) {
            $.fn.myfunction = function () {
                var li_count = $(this).length;
                //console.log(li_count);
                $(this).parent().addClass("li-count-" + li_count + "");
                return this;
            };
        })(jQuery);
        $('.sec1 .pi-listing-main ul li').myfunction();
        $('.sec2 .pi-listing-main ul li').myfunction();
    }
// count LI

// first last li and remove class
    $('ul').each(function(){
        $(this).find('li:first-child').addClass('first');
        $(this).find('li:last-child').addClass('last');
    });
    $('li').each(function(){
        var last = $(this);
        last.hasClass('last') === true ? last.removeClass('mb-4') : '';
        last.hasClass('last') === true ? last.removeClass('mb-4') : '';
    });
// first last li and remove class
});