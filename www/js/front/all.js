$.Controller("All",{
  cart_item_template:null,
  ".size -> click":function(ev){
    var el = $(ev.target)
    ev.preventDefault();
    el.toggleClass("clicked")
    if(this.enabled_sizes.hasOwnProperty(el.data("name"))){
      delete this.enabled_sizes[el.data("name")];
    }
    else{
      this.enabled_sizes[el.data("name")] = el.data("id")
    }
    this.element.find(".prod_qty").remove()
    if(Object.keys(this.enabled_sizes).length){
      this.element.find("#quantity_wanted_p,#add_to_cart").show()
      this.element.find("#sfwefwefwe").hide()
      for (var prop in this.enabled_sizes) {
        var block = this.qty_template.clone();
        block.find(".size_name").text(prop)
        this.element.find("#quantity_wanted_p").append(block)
      };
      
    }
    else{
      this.element.find("#quantity_wanted_p,#add_to_cart").hide()
      this.element.find("#sfwefwefwe").show()
    }
  },
  ".size_btn -> click":function(ev){
    ev.preventDefault();
  },
  ".same_addr -> change":function(ev){
    var val = Number($(ev.target).val());
    if(val){
      this.element.find(".addr_int").removeAttr("disabled");
    }
    else{
      this.element.find(".addr_int").attr("disabled","disabled");
      this.element.find(".addr_int").focus();
    }
  },
  ".chck_btn -> click":function(ev){
    var el = $(ev.target);
    var adr_val = Number(this.element.find(".same_addr:checked").val());
    var addr_el = this.element.find(".addr_int")
    if(adr_val && addr_el.val().length < 10){
      ev.preventDefault();
    }
    else if(adr_val && addr_el.val().length > 10){
      var url = el.attr("href");
      var base =  url.split("?")[0];
      var new_url = base + "?address=" + addr_el.val();
      ev.preventDefault();
      window.location.href = new_url
    }
    else{
    }
    
  },
  init:function(){
    var self = this;
    this.enabled_sizes = {}
    this.notification = this.element.find("#layer_cart");
    this.parent.cart_item_template = this.element.find("#prod_template").html();
    this.element.find("#prod_template").remove();
    this.quantity_wanted = this.element.find("#quantity_wanted_");
    this.element.find("form").each(function(){self.setup_validation($(this))});
    this.create_account_error = this.element.find("#create_account_error").clone();
    this.element.find("#create_account_error").remove();
    if($("#phone").size())
      $("#phone").mask("(999) 999-99-99")
    this.qty_template = this.element.find(".prod_qty").clone()
    this.element.find(".prod_qty").remove()
  },
  "#submitNewMessage -> click":function(ev){
    ev.preventDefault();
    var form =$(ev.target).parents("form");
    if(form.valid()){
      $.ajax({
        url:form.attr("action"),
        data:form.serialize(),
        dataType: "json",
        success:function(resp){
          if(resp.success){
            window.location.reload();
          }
        }
      });
    }
  },
  ".layered_filter input -> change":function(ev){
    $(ev.target).parents("form").submit();
  },
  ".product_quantity_up -> click":function(ev){
    ev.preventDefault();
    var inp =  $(ev.target).parents(".prod_qty").find("input[type=text]");
    inp.val(Number(inp.val()) + 1);
   // this.quantity_wanted.val(Number(this.quantity_wanted.val()) + 1);
    inp.change();
  },
  ".product_quantity_down -> click":function(ev){
    ev.preventDefault();
    var inp =  $(ev.target).parents(".prod_qty").find("input[type=text]");
    if(Number(inp.val()) > 1){
      inp.val(Number(inp.val()) - 1);
      inp.change();
    }
    
  },
  ".del -> click":function(ev){
    ev.preventDefault();
    var el = $(ev.target);
    el = el.hasClass("del") ? el : el.parents(".del");
    $.ajax({
      url: el.attr("href"),
      data:{qty:el.data("count")},
      dataType: "json",
      success:function(resp){
        if(resp.success){
          window.location.reload();
        }
      }
    })
  },
  ".cart_quantity_up -> click":function(ev){
    ev.preventDefault();
    var el = $(ev.target);
    el = el.hasClass("cart_quantity_up") ? el : el.parents(".cart_quantity_up");
    $.ajax({
      url: el.attr("href"),
      data:{qty:el.data("count")},
      dataType: "json",
      success:function(resp){
        if(resp.success){
          window.location.reload();
        }
      }
    })
  } ,
  ".ajax_add_to_cart_button  -> click":function(ev){
    ev.preventDefault();
    var self = this;
    var el = $(ev.target).hasClass("ajax_add_to_cart_button") ? $(ev.target) : $(ev.target).parents(".ajax_add_to_cart_button");
    var sizes = []
    this.element.find(".prod_qty").find(".text").each(function(){
      var el = $(this);
      var size_ = el.siblings(".size_btn").find(".size_name").text()
      sizes.push({size:size_,count:el.val()})
    })
    $.ajax({
      url:el.attr("href"),
      data:{sizes:sizes},
      dataType:"json",
      success:function(resp){
        if(resp.success){
          self.element.find(".cart_block_list .products").empty();
          self.element.find(".prod_qty").remove();
          self.enabled_sizes = {}
          self.element.find("#quantity_wanted_p,#add_to_cart").hide()
          self.element.find("#sfwefwefwe").show()

          for(i in resp.items){
            var block = self.parent.cart_item_template;
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%seo%",resp.items[i].id);
            block = block.replace("%seo%",resp.items[i].id);
            block = block.replace("%price%",resp.items[i].price);
            block = block.replace("%size%",resp.items[i].size);
            block = block.replace("%size%",resp.items[i].size);
            block = block.replace("%count%",resp.items[i].count);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            self.element.find(".cart_block_list .products").append($(block));
          }
          var total_el = self.element.find(".ajax_cart_quantity");
          total_el.text(sprintf(total_el.text().replace(/[0-9]+/g, "%s") ,resp.items.length));
          self.element.find(".cart_block_total, .ajax_block_cart_total").text(self.element.find(".cart_block_total").text().replace(/[0-9]+/g,resp.total));
          self.element.find(".cart-buttons").removeClass("hidden");
          self.element.find(".cart_block_no_products").addClass("hidden");
        }
      }
    })
    this.enabled_sizes = self.enabled_sizes;
  },
  ".remove -> click":function(ev){
    ev.preventDefault();
    var el = $(ev.target).hasClass("remove") ? $(ev.target) : $(ev.target).parents(".remove");
    var self = this;
    console.log(el.data("size"))
    var sizes = [{size:el.data("size"),count:1}]
    $.ajax({
      url:"/delete_from_cart/" + el.data("id"),
      data:{sizes:sizes},
      dataType:"json",
      success:function(resp){
        if(resp.success){
          self.element.find(".cart_block_list .products").empty();
          for(i in resp.items){
            var block = self.parent.cart_item_template;
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%id%",resp.items[i].id);
            block = block.replace("%seo%",resp.items[i].id);
            block = block.replace("%size%",resp.items[i].size);
            block = block.replace("%size%",resp.items[i].size);
            block = block.replace("%seo%",resp.items[i].id);
            block = block.replace("%price%",resp.items[i].price);
            block = block.replace("%count%",resp.items[i].count);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            block = block.replace("%name%",resp.items[i].name);
            
            self.element.find(".cart_block_list .products").append($(block));
          }
          var total_el = self.element.find(".ajax_cart_quantity");
          if(resp.items.length == 0){
            self.element.find(".cart-buttons").addClass("hidden");
            self.element.find(".cart_block_no_products").removeClass("hidden");
          }
          
          total_el.text(sprintf(total_el.text().replace(/[0-9]+/g, "%s") ,resp.ids.length));
          self.element.find(".cart_block_total").text(self.element.find(".cart_block_total").text().replace(/[0-9]+/g,resp.total));
        }
      }
    })
  },
  submit_form:function(form){
    $.ajax({
      url:form.attr("action"),
      data:form.serialize(),
      dataType:"json",
      success:function(resp){
        if(resp.success){
          window.location.href = resp.href;
        }
      }
    })
  },

  "#do_order -> click":function(ev){
    ev.preventDefault();
    var form = $(ev.target).parents("form");
    if(form.valid()){
       this.submit_form(form);
    }

  },
  setup_validation: function(form) {
    var self = this
    form.validate({
  errorPlacement : function(error, element) {
    error.addClass("error");
  },
    onkeyup: false,
    onfocusout: false,
    focusCleanup: true,
    focusInvalid: false,
    minlength:3
    });
  },
  "#SubmitCreate -> click":function(ev){
    ev.preventDefault();
    var form = $(ev.target).parents("form");
    var self = this;
    if(form.valid()){
      $.ajax({
        url:form.attr("action"),
        data:form.serialize(),
        dataType: "json",
        success:function(resp){
          if(resp.success){
            window.location.reload();
          }
          else{
            form.find(".alert-danger").remove();
            for (var i = 0; i < resp.errors.length; i++) {
              var text = resp.errors[i][Object.keys(resp.errors[0])]
              form.find(".form_content").prepend(self.create_account_error.text(text));
            };
            form.find(".alert-danger").show();form.find(".alert-danger").show().delay(1000).fadeOut('slow');
          }
        }
      });
     }
  },
  "#SubmitLogin -> click":function(ev){
    ev.preventDefault();
    var form =$(ev.target).parents("form");
    var self = this;
    if(form.valid()){
      $.ajax({
        url:form.attr("action"),
        data:form.serialize(),
        dataType: "json",
        success:function(resp){
          if(resp.success){
            window.location.reload();
          }
          else{
            form.find(".alert-danger").remove();
            for (var i = 0; i < resp.errors.length; i++) {
              var text = resp.errors[i][Object.keys(resp.errors[0])];
              form.find(".form_content").prepend(self.create_account_error.text(text));
            };
            form.find(".alert-danger").show();form.find(".alert-danger").show().delay(1000).fadeOut('slow');
          }
        }
      });
    }
  },

  

});


function sprintf() {
  //  discuss at: http://phpjs.org/functions/sprintf/
  // original by: Ash Searle (http://hexmen.com/blog/)
  // improved by: Michael White (http://getsprink.com)
  // improved by: Jack
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Dj
  // improved by: Allidylls
  //    input by: Paulo Freitas
  //    input by: Brett Zamir (http://brett-zamir.me)
  //   example 1: sprintf("%01.2f", 123.1);
  //   returns 1: 123.10
  //   example 2: sprintf("[%10s]", 'monkey');
  //   returns 2: '[    monkey]'
  //   example 3: sprintf("[%'#10s]", 'monkey');
  //   returns 3: '[####monkey]'
  //   example 4: sprintf("%d", 123456789012345);
  //   returns 4: '123456789012345'
  //   example 5: sprintf('%-03s', 'E');
  //   returns 5: 'E00'

  var regex = /%%|%(\d+\$)?([-+\'#0 ]*)(\*\d+\$|\*|\d+)?(\.(\*\d+\$|\*|\d+))?([scboxXuideEfFgG])/g;
  var a = arguments;
  var i = 0;
  var format = a[i++];

  // pad()
  var pad = function(str, len, chr, leftJustify) {
    if (!chr) {
      chr = ' ';
    }
    var padding = (str.length >= len) ? '' : new Array(1 + len - str.length >>> 0)
      .join(chr);
    return leftJustify ? str + padding : padding + str;
  };

  // justify()
  var justify = function(value, prefix, leftJustify, minWidth, zeroPad, customPadChar) {
    var diff = minWidth - value.length;
    if (diff > 0) {
      if (leftJustify || !zeroPad) {
        value = pad(value, minWidth, customPadChar, leftJustify);
      } else {
        value = value.slice(0, prefix.length) + pad('', diff, '0', true) + value.slice(prefix.length);
      }
    }
    return value;
  };

  // formatBaseX()
  var formatBaseX = function(value, base, prefix, leftJustify, minWidth, precision, zeroPad) {
    // Note: casts negative numbers to positive ones
    var number = value >>> 0;
    prefix = prefix && number && {
      '2': '0b',
      '8': '0',
      '16': '0x'
    }[base] || '';
    value = prefix + pad(number.toString(base), precision || 0, '0', false);
    return justify(value, prefix, leftJustify, minWidth, zeroPad);
  };

  // formatString()
  var formatString = function(value, leftJustify, minWidth, precision, zeroPad, customPadChar) {
    if (precision != null) {
      value = value.slice(0, precision);
    }
    return justify(value, '', leftJustify, minWidth, zeroPad, customPadChar);
  };

  // doFormat()
  var doFormat = function(substring, valueIndex, flags, minWidth, _, precision, type) {
    var number, prefix, method, textTransform, value;

    if (substring === '%%') {
      return '%';
    }

    // parse flags
    var leftJustify = false;
    var positivePrefix = '';
    var zeroPad = false;
    var prefixBaseX = false;
    var customPadChar = ' ';
    var flagsl = flags.length;
    for (var j = 0; flags && j < flagsl; j++) {
      switch (flags.charAt(j)) {
        case ' ':
          positivePrefix = ' ';
          break;
        case '+':
          positivePrefix = '+';
          break;
        case '-':
          leftJustify = true;
          break;
        case "'":
          customPadChar = flags.charAt(j + 1);
          break;
        case '0':
          zeroPad = true;
          customPadChar = '0';
          break;
        case '#':
          prefixBaseX = true;
          break;
      }
    }

    // parameters may be null, undefined, empty-string or real valued
    // we want to ignore null, undefined and empty-string values
    if (!minWidth) {
      minWidth = 0;
    } else if (minWidth === '*') {
      minWidth = +a[i++];
    } else if (minWidth.charAt(0) == '*') {
      minWidth = +a[minWidth.slice(1, -1)];
    } else {
      minWidth = +minWidth;
    }

    // Note: undocumented perl feature:
    if (minWidth < 0) {
      minWidth = -minWidth;
      leftJustify = true;
    }

    if (!isFinite(minWidth)) {
      throw new Error('sprintf: (minimum-)width must be finite');
    }

    if (!precision) {
      precision = 'fFeE'.indexOf(type) > -1 ? 6 : (type === 'd') ? 0 : undefined;
    } else if (precision === '*') {
      precision = +a[i++];
    } else if (precision.charAt(0) == '*') {
      precision = +a[precision.slice(1, -1)];
    } else {
      precision = +precision;
    }

    // grab value using valueIndex if required?
    value = valueIndex ? a[valueIndex.slice(0, -1)] : a[i++];

    switch (type) {
      case 's':
        return formatString(String(value), leftJustify, minWidth, precision, zeroPad, customPadChar);
      case 'c':
        return formatString(String.fromCharCode(+value), leftJustify, minWidth, precision, zeroPad);
      case 'b':
        return formatBaseX(value, 2, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
      case 'o':
        return formatBaseX(value, 8, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
      case 'x':
        return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
      case 'X':
        return formatBaseX(value, 16, prefixBaseX, leftJustify, minWidth, precision, zeroPad)
          .toUpperCase();
      case 'u':
        return formatBaseX(value, 10, prefixBaseX, leftJustify, minWidth, precision, zeroPad);
      case 'i':
      case 'd':
        number = +value || 0;
        number = Math.round(number - number % 1); // Plain Math.round doesn't just truncate
        prefix = number < 0 ? '-' : positivePrefix;
        value = prefix + pad(String(Math.abs(number)), precision, '0', false);
        return justify(value, prefix, leftJustify, minWidth, zeroPad);
      case 'e':
      case 'E':
      case 'f': // Should handle locales (as per setlocale)
      case 'F':
      case 'g':
      case 'G':
        number = +value;
        prefix = number < 0 ? '-' : positivePrefix;
        method = ['toExponential', 'toFixed', 'toPrecision']['efg'.indexOf(type.toLowerCase())];
        textTransform = ['toString', 'toUpperCase']['eEfFgG'.indexOf(type) % 2];
        value = prefix + Math.abs(number)[method](precision);
        return justify(value, prefix, leftJustify, minWidth, zeroPad)[textTransform]();
      default:
        return substring;
    }
  };

  return format.replace(regex, doFormat);
}