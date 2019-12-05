! function($, n, e) {
  var o = $();
  $.fn.dropdownHover = function(e) {
    return "ontouchstart" in document ? this : (o = o.add(this.parent()), this.each(function() {
      function t(e) {
        o.find(":focus").blur(), h.instantlyCloseOthers === !0 && o.removeClass("open"), n.clearTimeout(c), i.addClass("open"), r.trigger(a)
      }
      var r = $(this),
        i = r.parent(),
        d = {
          delay: 100,
          instantlyCloseOthers: !0
        },
        s = {
          delay: $(this).data("delay"),
          instantlyCloseOthers: $(this).data("close-others")
        },
        a = "show.bs.dropdown",
        u = "hide.bs.dropdown",
        h = $.extend(!0, {}, d, e, s),
        c;
      i.hover(function(n) {
        return i.hasClass("open") || r.is(n.target) ? void t(n) : !0
      }, function() {
        c = n.setTimeout(function() {
          i.removeClass("open"), r.trigger(u)
        }, h.delay)
      }), r.hover(function(n) {
        return i.hasClass("open") || i.is(n.target) ? void t(n) : !0
      }), i.find(".dropdown-submenu").each(function() {
        var e = $(this),
          o;
        e.hover(function() {
          n.clearTimeout(o), e.children(".dropdown-menu").show(), e.siblings().children(".dropdown-menu").hide()
        }, function() {
          var t = e.children(".dropdown-menu");
          o = n.setTimeout(function() {
            t.hide()
          }, h.delay)
        })
      })
    }))
  }, $(document).ready(function() {
    $('[data-hover="dropdown"]').dropdownHover()
  })
}(jQuery, this);

$(function(){
    $(".left-scroll").click(function () { 
        var leftPos = $('.content').scrollLeft();
        $(".content").animate({scrollLeft: leftPos - 300}, 300);
      });
      
      $(".right-scroll").click(function () { 
        var leftPos = $('.content').scrollLeft();
        $(".content").animate({scrollLeft: leftPos + 300}, 300);
      });

      $(".arrows-left").click(function () { 
        var leftPos = $('.mostviewed-box').scrollLeft();
        $(".mostviewed-box").animate({scrollLeft: leftPos - 300}, 300);
      });
      
      $(".arrows-right").click(function () { 
        var leftPos = $('.mostviewed-box').scrollLeft();
        $(".mostviewed-box").animate({scrollLeft: leftPos + 300}, 300);
      });


      $("#expandedImg").blowup({
          round: false,
        "background" : "#444",
        "width" : 250,
        "height" : 250
      });

      $('.preveiwer .partners img').click(function(){

          $("#expandedImg").animate({opacity: .6},200)
            .attr('src', $(this).attr('src'))
            .animate({opacity: 1},200);
            $("#expandedImg").blowup({
              round: false,
             "background" : "#444",
             "width" : 250,
             "height" : 250
           });
      });


});



// Price Sliders
let minDollars = 0;
let maxDollars = 15000;

let minSlider = document.querySelector('.filter-price #min');
let maxSlider = document.querySelector('.filter-price #max');

function numberWithSpaces(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
}

function updateDollars() {
  let fromValue = (maxDollars - minDollars) * minSlider.value / 100 + minDollars;
  let toValue = (maxDollars - minDollars) * maxSlider.value / 100 + minDollars;

  document.querySelector('.filter-price #from').textContent = `$${numberWithSpaces(Math.floor(fromValue))}`;
  document.querySelector('.filter-price #to').textContent = `$${numberWithSpaces(Math.floor(toValue))}`;

}

maxSlider.addEventListener('input', () => {
    let minValue = parseInt(minSlider.value);
    let maxValue = parseInt(maxSlider.value);

    if (maxValue < minValue + 10) {
      minSlider.value = maxValue - 10;

      if (minValue === parseInt(minSlider.min)) {
        maxSlider.value = 10;
      }
    }

    updateDollars();
});

minSlider.addEventListener('input', () => {
    let minValue = parseInt(minSlider.value);
    let maxValue = parseInt(maxSlider.value);

    if (minValue > maxValue - 10) {
      maxSlider.value = minValue + 10;

      if (maxValue === parseInt(maxSlider.max)) {
        minSlider.value = parseInt(maxSlider.max) - 10;
      }
    }

    updateDollars();
});

