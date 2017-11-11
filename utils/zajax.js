(function(b, p) {
    "function" === typeof define && define.amd ? define(p) : "object" === typeof exports ? module.exports = p() : b.NProgress = p()
})(this, function() {
    function b(a, d, b) {
        return a < d ? d : a > b ? b : a
    }

    function p(a, d, b) {
        a = "translate3d" === f.positionUsing ? {
            transform: "translate3d(" + 100 * (-1 + a) + "%,0,0)"
        } : "translate" === f.positionUsing ? {
            transform: "translate(" + 100 * (-1 + a) + "%,0)"
        } : {
            "margin-left": 100 * (-1 + a) + "%"
        };
        a.transition = "all " + d + "ms " + b;
        return a
    }

    function y(a, d) {
        return 0 <= ("string" == typeof a ? a : v(a)).indexOf(" " + d + " ")
    }

    function t(a,
        d) {
        var b = v(a),
            c = b + d;
        y(b, d) || (a.className = c.substring(1))
    }

    function z(a, d) {
        var b = v(a);
        y(a, d) && (b = b.replace(" " + d + " ", " "), a.className = b.substring(1, b.length - 1))
    }

    function v(a) {
        return (" " + (a.className || "") + " ").replace(/\s+/gi, " ")
    }
    var c = {
            version: "0.1.6"
        },
        f = c.settings = {
            minimum: .08,
            easing: "ease",
            positionUsing: "",
            speed: 200,
            trickle: !0,
            trickleRate: .02,
            trickleSpeed: 800,
            showSpinner: !0,
            barSelector: '[role="bar"]',
            spinnerSelector: '[role="spinner"]',
            parent: "body",
            template: '<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'
        };
    c.configure = function(a) {
        var b, c;
        for (b in a) c = a[b], void 0 !== c && a.hasOwnProperty(b) && (f[b] = c);
        return this
    };
    c.status = null;
    c.set = function(a) {
        var d = c.isStarted();
        a = b(a, f.minimum, 1);
        c.status = 1 === a ? null : a;
        var e = c.render(!d),
            q = e.querySelector(f.barSelector),
            m = f.speed,
            k = f.easing;
        e.offsetWidth;
        A(function(b) {
            "" === f.positionUsing && (f.positionUsing = c.getPositioningCSS());
            n(q, p(a, m, k));
            1 === a ? (n(e, {
                transition: "none",
                opacity: 1
            }), e.offsetWidth, setTimeout(function() {
                n(e, {
                    transition: "all " + m + "ms linear",
                    opacity: 0
                });
                setTimeout(function() {
                    c.remove();
                    b()
                }, m)
            }, m)) : setTimeout(b, m)
        });
        return this
    };
    c.isStarted = function() {
        return "number" === typeof c.status
    };
    c.start = function() {
        c.status || c.set(0);
        var a = function() {
            setTimeout(function() {
                c.status && (c.trickle(), a())
            }, f.trickleSpeed)
        };
        f.trickle && a();
        return this
    };
    c.done = function(a) {
        return a || c.status ? c.inc(.3 + .5 * Math.random()).set(1) : this
    };
    c.inc = function(a) {
        var d = c.status;
        return d ? ("number" !== typeof a && (a = (1 - d) * b(Math.random() * d, .1, .95)), d = b(d + a, 0, .994), c.set(d)) : c.start()
    };
    c.trickle =
        function() {
            return c.inc(Math.random() * f.trickleRate)
        };
    (function() {
        var a = 0,
            b = 0;
        c.promise = function(e) {
            if (!e || "resolved" == e.state()) return this;
            0 == b && c.start();
            a++;
            b++;
            e.always(function() {
                b--;
                0 == b ? (a = 0, c.done()) : c.set((a - b) / a)
            });
            return this
        }
    })();
    c.render = function(a) {
        if (c.isRendered()) return document.getElementById("nprogress");
        t(document.documentElement, "nprogress-busy");
        var b = document.createElement("div");
        b.id = "nprogress";
        b.innerHTML = f.template;
        var e = b.querySelector(f.barSelector),
            q = a ? "-100" : 100 * (-1 +
                (c.status || 0));
        a = document.querySelector(f.parent);
        n(e, {
            transition: "all 0 linear",
            transform: "translate3d(" + q + "%,0,0)"
        });
        f.showSpinner || (e = b.querySelector(f.spinnerSelector)) && e && e.parentNode && e.parentNode.removeChild(e);
        a != document.body && t(a, "nprogress-custom-parent");
        a.appendChild(b);
        return b
    };
    c.remove = function() {
        z(document.documentElement, "nprogress-busy");
        z(document.querySelector(f.parent), "nprogress-custom-parent");
        var a = document.getElementById("nprogress");
        a && a && a.parentNode && a.parentNode.removeChild(a)
    };
    c.isRendered = function() {
        return !!document.getElementById("nprogress")
    };
    c.getPositioningCSS = function() {
        var a = document.body.style,
            b = "WebkitTransform" in a ? "Webkit" : "MozTransform" in a ? "Moz" : "msTransform" in a ? "ms" : "OTransform" in a ? "O" : "";
        return b + "Perspective" in a ? "translate3d" : b + "Transform" in a ? "translate" : "margin"
    };
    var A = function() {
            function b() {
                var e = c.shift();
                e && e(b)
            }
            var c = [];
            return function(e) {
                c.push(e);
                1 == c.length && b()
            }
        }(),
        n = function() {
            function b(a) {
                return a.replace(/^-ms-/, "ms-").replace(/-([\da-z])/gi,
                    function(b, a) {
                        return a.toUpperCase()
                    })
            }

            function c(d) {
                d = b(d);
                var k;
                if (!(k = f[d])) {
                    k = d;
                    a: {
                        var u = document.body.style;
                        if (!(d in u))
                            for (var r = e.length, l = d.charAt(0).toUpperCase() + d.slice(1), h; r--;)
                                if (h = e[r] + l, h in u) {
                                    d = h;
                                    break a
                                }
                    }
                    k = f[k] = d
                }
                return k
            }
            var e = ["Webkit", "O", "Moz", "ms"],
                f = {};
            return function(b, a) {
                var e = arguments,
                    f, l;
                if (2 == e.length)
                    for (f in a) {
                        if (l = a[f], void 0 !== l && a.hasOwnProperty(f)) {
                            var e = b,
                                h = f,
                                h = c(h);
                            e.style[h] = l
                        }
                    } else f = b, h = e[1], e = e[2], h = c(h), f.style[h] = e
            }
        }();
    return c
});
(function(b) {
    function p(a, c) {
        B = !0;
        return $zajax = b.ajax({
            type: "GET",
            url: a,
            dataType: "html"
        }).done(function(d, e, f) {
            console.log("ajax preload");
            1 == k && (d = d.replace("<body", '<body><div id="zajax"').replace("</body>", "</div></body>"));
            r = d = b(d);
            h = a;
            B = !1;
            !1 === c && t(d, c)
        }).fail(function() {
            NProgress.done();
            b($mainContent).removeClass("zajax-opacity").html('<h2 style="text-align: center;margin:50px 0;">Error loading page<h2>')
        }).always(function() {})
    }

    function y(a) {
        a.done(function(a) {
            $waitdata = b(a);
            t($waitdata, !1)
        })
    }

    function t(a, c) {
        u = "";
        $title = a.filter("title").text();
        document.title = $title;
        a.html();
        for (var e in E) {
            var g = b.trim(E[e]);
            $datael = a.find(g);
            void 0 == $datael.html() && ($datael = a.filter(g));
            b(g).html($datael.html())
        }
        r = "";
        v();
        d && void 0 !== d && null !== d && z();
        NProgress.done();
        b($mainContent).removeClass("zajax-opacity").addClass("zajax-transition");
        zajax_complete();
        f && A ? (console.log("imagesLoaded exist"), b(n).imagesLoaded().done(function(a) {
            console.log("all images loaded");
            b(n).masonry()
        })) : !f && A && b(n).masonry()
    }

    function z() {
        document.head = document.head || document.getElementsByTagName("head")[0];
        var a = document.head.getElementsByTagName("script"),
            b, c, e, f, g = 0,
            g = 0;
        for (j = a.length; g < j; g++) b = a[g], b.src.match(d) && (c = document.createElement("script"), b.src && (c.src = b.src), e = b.parentNode, f = b.nextSibling, e.removeChild(b), e.insertBefore(c, f))
    }

    function v() {
        var a = document.body.getElementsByTagName("script"),
            c, d, e, f, g = 0,
            g = 0;
        for (j = a.length; g < j; g++) c = a[g], c.src.match(q) || (d = document.createElement("script"), c.src && (d.src = c.src),
            e = c.parentNode, f = c.nextSibling, e.removeChild(c), e.insertBefore(d, f));
        window.location.hash && (w = "#" + window.location.hash.split("#")[1], b("html,body").animate({
            scrollTop: b(w).offset().top - 100
        }, 700), w = "")
    }
    var c = /android|webos|iphone|ipad|ipod|blackberry|bb|playbook|iemobile|windows phone|kindle|silk|opera mini/i.test(navigator.userAgent.toLowerCase());
    c && FastClick.attach(document.body);
    if ("function" === typeof b.fn.imagesLoaded) {
        console.log("imagesLoaded exist");
        var f = !0
    }
    if ("function" === typeof b.fn.masonry) {
        console.log("masonry exist");
        var A = !0
    }
    1 == zajax_data.zajax_back && b("body").prepend('<span class="zaback"><div></div></span>');
    b(document).on("click", ".zaback", function() {
        window.history.back()
    });
    NProgress.configure({
        ease: "ease",
        speed: 300,
        minimum: .02,
        trickleRate: .2,
        trickleSpeed: 175
    });
    var n = zajax_data.zajax_masonry,
        a = zajax_data.zajax_ignore,
        d = zajax_data.zajax_dolist,
        e = zajax_data.zajax_search,
        a = a ? "," + b.trim(a) : "",
        q = "zajax.js" + a,
        q = q.replace(/,/g, "|").replace(/ /g, "");
    d && void 0 !== d && null !== d ? (d = b.trim(d), d = d.replace(/,/g, "|").replace(/ /g,
        "")) : d = "";
    var m = !1,
        k = 0,
        u, r, l, h, w = "",
        B = !1,
        C;
    1 == zajax_data.zajax_body && (k = 1);
    1 == zajax_data.zajax_preload && (C = 1);
    (a = b.trim(zajax_data.zajax_ClassID)) && (a = "," + a);
    $mainContent = zajax_data.zajax_main;
    $mainContent += ",";
    b.each($mainContent.split(",").slice(0, -1), function(a, c) {
        if (0 !== b(c).length) return $mainContent = c, !1
    });
    ($mainContent = c ? zajax_data.zajax_main_mobile : zajax_data.zajax_main) && void 0 !== $mainContent || ($mainContent = zajax_data.zajax_main);
    $mainContent = b.trim($mainContent);
    a = $mainContent + a;
    b($mainContent).addClass("zajax-transition");
    0 == b("#zajax").length && 1 == k && b("body").wrapInner('<div id="zajax" />');
    1 == k && (a = "#zajax");
    var E = a.split(","),
        F = location.origin,
        g = "",
        a = "a[href^='" + F + "']:not(a[href*='/wp-']):not([href$='/feed']):not([href$='/feed/podcasts']):not(.no-ajax)",
        x, D = 0;
    b(document).on("mouseover", a, function() {
        c || 1 !== C || (g = this.href, D = new Date, x = setTimeout(function() {
            g != window.location && g != l && zajax_url(g, !0);
            l = g
        }, 100))
    }).mouseout(function() {
        c || 1 !== C || (null != x && clearTimeout(x), B && (B = !1, l = g))
    }).on("click", a, function() {
        null != x && clearTimeout(x);
        console.log(new Date -
            D);
        D = 0;
        g = this.href;
        this.blur();
        if (-1 === g.indexOf("#")) b("html,body").animate({
            scrollTop: 0
        }, 500);
        else {
            var a = g.slice(0, g.indexOf("#"));
            if (window.location == a || window.location == g) w = "#" + g.split("#")[1], b("html,body").animate({
                scrollTop: b(w).offset().top - 100
            }, 700), window.history.pushState(null, null, g), g = ""
        }
        g != window.location && g && (window.history.pushState({
            path: g
        }, "", g), zajax_url(g, !1));
        return !1
    });
    b(document).on("submit", "form", function(a) {
        var c = b(this),
            d = c.attr("id"),
            f = "." + c.attr("class"),
            g = d ? "#" + d : f,
            d =
            c.serialize();
        if (0 <= e.indexOf(g)) {
            d = b(this).find('input[type="search"]').val();
            "undefined" === typeof d && (d = b(this).find('input[type="text"]').val());
            d = F + "?s=" + d;
            window.history.pushState({path: d }, "", d), zajax_url(d, !1), b("html,body").animate({ scrollTop: 0}, 500); 
		}
		else { (NProgress.start(), b(g).append('<span class="submitLoading">Patienter...</span>'), b.ajax({
            url: c.attr("action"),
            type: c.attr("method"),
            data: d,
            success: function(a) {
                b(".submitLoading").remove();
                b(g).append('<div class="m_success alert alert-success" style="margin:10px"><span class="close" data-dismiss="alert"></span><strong>Ça a marché&nbsp;!</strong> Votre demande a bien été prise en compte.</div>');
                zajax_url(window.location, !1);
                b(".submitLoading").remove();
                b(".m_success").show().delay(3E3).fadeOut(1E3);
                setTimeout(function() {
                    b(".m_success").remove()
                }, 4E3)
            },
            error: function() {
                NProgress.done();
                b(g).append('<div class="m_error alert alert-error"><span class="close" style="margin:10px" data-dismiss="alert"></span><strong>Erreur&nbsp;!</strong>  Impossible d\'envoyer votre demande.</div>');
                b(".m_error").show().delay(3E3).fadeOut(1E3);
                setTimeout(function() {
                    b(".submitLoading").remove();
                    b(".m_error").remove()
                }, 4E3)
            }
        })); }
        c.find("input[type=text],input[type=search]").blur().val(""); -
        1 === c.attr("action").indexOf("paypal.") && a.preventDefault()
    });
    window.onpopstate = function(a) {
        !0 === m && zajax_url(document.location, !1)
    };
    window.zajax_url = function(a, c) {
        a && (m = !0, !1 === c && (zajax_send(), NProgress.start(), b($mainContent).addClass("zajax-opacity")), u === a && !1 === c ? r && a == h ? t(r, c) : y($zajax) : (!0 === c && (u = a), p(a, c)))
    };
    window.zajax_goto = function(a) {
        a != window.location && a && (window.history.pushState({
            path: a
        }, "", a), zajax_url(a, !1))
    }
})(jQuery);
