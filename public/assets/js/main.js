const HSThemeAppearance = {
    init() {
        const defaultTheme = 'default'
        let theme = localStorage.getItem('hs_theme') || defaultTheme

        if (document.querySelector('html').classList.contains('dark')) return
        this.setAppearance(theme)
    },
    _resetStylesOnLoad() {
        const $resetStyles = document.createElement('style')
        $resetStyles.innerText = `*{transition: unset !important;}`
        $resetStyles.setAttribute('data-hs-appearance-onload-styles', '')
        document.head.appendChild($resetStyles)
        return $resetStyles
    },
    setAppearance(theme, saveInStore = true, dispatchEvent = true) {
        const $resetStylesEl = this._resetStylesOnLoad()

        if (saveInStore) {
            localStorage.setItem('hs_theme', theme)
        }

        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
        }

        document.querySelector('html').classList.remove('dark')
        document.querySelector('html').classList.remove('default')
        document.querySelector('html').classList.remove('auto')

        document.querySelector('html').classList.add(this.getOriginalAppearance())

        setTimeout(() => {
            $resetStylesEl.remove()
        })

        if (dispatchEvent) {
            window.dispatchEvent(new CustomEvent('on-hs-appearance-change', {detail: theme}))
        }
    },
    getAppearance() {
        let theme = this.getOriginalAppearance()
        if (theme === 'auto') {
            theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'default'
        }
        return theme
    },
    getOriginalAppearance() {
        const defaultTheme = 'default'
        return localStorage.getItem('hs_theme') || defaultTheme
    }
}
HSThemeAppearance.init()

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    if (HSThemeAppearance.getOriginalAppearance() === 'auto') {
        HSThemeAppearance.setAppearance('auto', false)
    }
})

window.addEventListener('load', () => {
    const $clickableThemes = document.querySelectorAll('[data-hs-theme-click-value]')
    const $switchableThemes = document.querySelectorAll('[data-hs-theme-switch]')

    $clickableThemes.forEach($item => {
        $item.addEventListener('click', () => HSThemeAppearance.setAppearance($item.getAttribute('data-hs-theme-click-value'), true, $item))
    })

    $switchableThemes.forEach($item => {
        $item.addEventListener('change', (e) => {
            HSThemeAppearance.setAppearance(e.target.checked ? 'dark' : 'default')
        })

        $item.checked = HSThemeAppearance.getAppearance() === 'dark'
    })

    window.addEventListener('on-hs-appearance-change', e => {
        $switchableThemes.forEach($item => {
            $item.checked = e.detail === 'dark'
        })
    })
})


!function() {
    var e = {
        855: function() {
            (()=>{
                const e = e=>{
                    e.forEach((e=>{
                        const {activeHeight: t} = e.dataset;
                        e.style.maxHeight = t || "100vh",
                        e.style.removeProperty("padding-top"),
                        e.style.removeProperty("padding-bottom")
                    }
                    ))
                }
                  , t = e=>{
                    e.forEach((e=>{
                        e.style.maxHeight = "0",
                        e.style.paddingTop = "0",
                        e.style.paddingBottom = "0"
                    }
                    ))
                }
                  , a = document.querySelectorAll(".accordion");
                a && a.forEach((a=>{
                    const {activeType: s} = a.dataset
                      , c = a.querySelectorAll(".collapse")
                      , r = a.querySelectorAll(".accordion-content");
                    c.forEach((c=>{
                        a.classList.contains("accordion-active") ? (c.checked = !0,
                        e(r)) : (c.checked = !1,
                        t(r)),
                        c.addEventListener("click", (o=>{
                            document.querySelectorAll(".accordion").forEach((e=>{
                                e.classList.remove("accordion-active")
                            }
                            )),
                            c.checked ? a.classList.add("accordion-active") : a.classList.remove("accordion-active"),
                            "single" === s && (c.classList.add("active"),
                            document.querySelectorAll(".accordion-content").forEach((e=>{
                                e.style.maxHeight = "0",
                                e.style.paddingTop = "0",
                                e.style.paddingBottom = "0"
                            }
                            )),
                            document.querySelectorAll(".collapse").forEach((e=>{
                                e.classList.value === o.target.classList.value && e.checked ? e.checked = !0 : e.checked = !1
                            }
                            )),
                            c.classList.remove("active")),
                            c.checked ? e(r) : t(r)
                        }
                        ))
                    }
                    )),
                    a.querySelectorAll(".collapse-label").forEach((e=>{
                        const t = e.querySelector(".collapse-label-icon");
                        if (t) {
                            const {activeRotate: a, activeColor: s, deactiveColor: c} = t.dataset;
                            e.addEventListener("click", (()=>{
                                t.classList.contains(a) ? t.classList.remove(a) : t.classList.add(a),
                                s && c && (t.classList.contains(a) ? (t.classList.remove(c),
                                t.classList.add(s)) : (t.classList.remove(s),
                                t.classList.add(c)))
                            }
                            ))
                        }
                    }
                    ))
                }
                ));
                const s = ["border-b-2", "border-primary-500"]
                  , c = ["border", "border-gray-300", "dark:border-gray-700"]
                  , r = document.getElementById("faqs-accordion");
                r && r.querySelectorAll(".accordion").forEach((e=>{
                    console.log(e),
                    e.classList.contains("accordion-active") ? e.classList.add(...s) : e.classList.add(...c),
                    e.addEventListener("click", (()=>{
                        r.querySelectorAll(".accordion").forEach((e=>{
                            e.classList.contains("accordion-active") ? (e.classList.remove(...c),
                            e.classList.add(...s)) : (e.classList.remove(...s),
                            e.classList.add(...c))
                        }
                        ))
                    }
                    ))
                }
                ))
            }
            )()
        },
        919: function() {
            (()=>{
                const e = (e,t)=>["active", `${e}-0`, `w-[${t || "220px"}]`]
                  , t = e=>[`${e}-0`, "w-0"]
                  , a = document.querySelectorAll(".drawer");
                if (a) {
                    function s() {
                        window.innerWidth > 768 && a.forEach((a=>{
                            const {classList: s} = a
                              , {placement: c, drawerWidth: r} = a.dataset;
                            s.remove(...e(c, r)),
                            s.add(...t(c))
                        }
                        ))
                    }
                    window.onresize = s,
                    window.onload = s,
                    a.forEach((s=>{
                        const {placement: c, drawerWidth: r, drawerName: o} = s.dataset;
                        document.querySelectorAll(".drawer-handler").forEach((l=>{
                            const {targetDrawer: i} = l.dataset;
                            l.addEventListener("click", (()=>{
                                if (i === o) {
                                    const {classList: a} = s;
                                    a.contains("active") ? (a.remove(...e(c, r)),
                                    a.add(...t(c))) : (a.remove(...t(c)),
                                    a.add(...e(c, r)))
                                } else
                                    a.forEach((a=>{
                                        const {classList: s} = a
                                          , {placement: c, drawerWidth: r, drawerName: o} = a.dataset;
                                        i !== o && (s.remove(...e(c, r)),
                                        s.add(...t(c)))
                                    }
                                    ))
                            }
                            ))
                        }
                        ))
                    }
                    ))
                }
            }
            )()
        },
        733: function() {
            (()=>{
                const e = document.querySelectorAll(".dropdown")
                  , t = document.querySelectorAll(".dropdown-list")
                  , a = e=>["visible", "opacity-100", "z-10", e]
                  , s = e=>["invisible", "opacity-0", "z-0", e];
                e && t && (window.onclick = function(e) {
                    e.target.matches(".dropdown") || e.target.parentNode.matches(".dropdown") || e.target.parentNode.parentNode.matches(".dropdown") || e.target.parentNode.parentNode.parentNode.matches(".dropdown") || t.forEach((e=>{
                        const {activeTop: t, deactiveTop: c} = e.dataset;
                        e.classList.remove(...a(t)),
                        e.classList.add(...s(c))
                    }
                    ))
                }
                ,
                e.forEach((e=>{
                    const {actionType: c} = e.dataset;
                    "hover" === c ? (e.addEventListener("mouseenter", (()=>{
                        const {targetElement: c} = e.dataset
                          , r = document.getElementById(c)
                          , {activeTop: o, deactiveTop: l} = r.dataset;
                        t.forEach((e=>{
                            const {activeTop: t, deactiveTop: c} = e.dataset;
                            e.classList.remove(...a(t)),
                            e.classList.add(...s(c))
                        }
                        )),
                        r.classList.remove(...s(l)),
                        r.classList.add(...a(o))
                    }
                    )),
                    e.addEventListener("mouseleave", (()=>{
                        const {targetElement: t} = e.dataset
                          , c = document.getElementById(t)
                          , {activeTop: r, deactiveTop: o} = c.dataset;
                        c.classList.remove(...a(r)),
                        c.classList.add(...s(o))
                    }
                    ))) : e.addEventListener("click", (()=>{
                        const {targetElement: c} = e.dataset
                          , r = document.getElementById(c)
                          , {activeTop: o, deactiveTop: l} = r.dataset;
                        t.forEach((e=>{
                            const t = e.getAttribute("id");
                            c !== t && (e.classList.remove(...a(o)),
                            e.classList.add(...s(l)))
                        }
                        )),
                        r.classList.contains("visible") ? (r.classList.remove(...a(o)),
                        r.classList.add(...s(l))) : (r.classList.remove(...s(l)),
                        r.classList.add(...a(o)))
                    }
                    ))
                }
                )))
            }
            )()
        },
        215: function() {
            (()=>{
                const e = ["top-0", "left-0", "right-0", "mx-auto"]
                  , t = ["fixed", ...e, "bg-white", "dark:bg-dark", "shadow-default", "py-3"]
                  , a = ["absolute", ...e, "bg-transparent", "py-5"];
                document.querySelectorAll(".navbar").forEach((s=>{
                    const c = s.dataset.navbarVersion;
                    "sticky" === s.dataset.positionStyle && (s.classList.add("absolute", ...e),
                    window.addEventListener("scroll", (()=>{
                        const e = window.pageYOffset;
                        "v1" === c ? (e > 100 && (s.classList.remove(...a),
                        s.classList.add(...t)),
                        0 === e && (s.classList.remove(...t),
                        s.classList.add(...a))) : (e > 100 && (s.classList.remove(...a),
                        s.classList.add(...t),
                        s.querySelectorAll(".search-box").forEach((e=>{
                            const t = e.getElementsByTagName("input")[0]
                              , a = e.getElementsByTagName("svg")[0];
                            t.classList.remove("text-primary-100", "placeholder:text-primary-100"),
                            t.classList.add("text-gray-700", "placeholder:text-gray-700"),
                            a.classList.remove("fill-primary-100"),
                            a.classList.add("fill-gray-700")
                        }
                        )),
                        s.querySelectorAll(".nav-text").forEach((e=>{
                            e.classList.remove("text-white", "hover:text-gray-300", "dark:hover:text-gray-300"),
                            e.classList.add("text-gray-900", "hover:text-primary-500", "dark:hover:text-primary-500"),
                            e.querySelectorAll("svg").forEach((e=>{
                                e.classList.remove("fill-white", "group-hover:fill-gray-300"),
                                e.classList.add("fill-gray-900", "group-hover:fill-primary-500")
                            }
                            ))
                        }
                        )),
                        s.querySelectorAll(".svg-button").forEach((e=>{
                            e.classList.replace("hover:border-gray-500", "hover:border-primary-500"),
                            e.querySelectorAll("svg").forEach((e=>{
                                e.classList.remove("fill-white", "group-hover:fill-gray-300"),
                                e.classList.add("fill-gray-700", "group-hover:fill-primary-500")
                            }
                            ))
                        }
                        ))),
                        0 === e && (s.classList.remove(...t),
                        s.classList.add(...a),
                        s.querySelectorAll(".search-box").forEach((e=>{
                            const t = e.getElementsByTagName("input")[0]
                              , a = e.getElementsByTagName("svg")[0];
                            t.classList.add("text-primary-100", "placeholder:text-primary-100"),
                            t.classList.remove("text-gray-700", "placeholder:text-gray-700"),
                            a.classList.add("fill-primary-100"),
                            a.classList.remove("fill-gray-700")
                        }
                        )),
                        s.querySelectorAll(".nav-text").forEach((e=>{
                            e.classList.add("text-white", "hover:text-gray-300", "dark:hover:text-gray-300"),
                            e.classList.remove("text-gray-900", "hover:text-primary-500", "dark:hover:text-primary-500"),
                            e.querySelectorAll("svg").forEach((e=>{
                                e.classList.add("fill-white", "group-hover:fill-gray-300"),
                                e.classList.remove("fill-gray-900", "group-hover:fill-primary-500")
                            }
                            ))
                        }
                        )),
                        s.querySelectorAll(".svg-button").forEach((e=>{
                            e.classList.replace("hover:border-primary-500", "hover:border-gray-500"),
                            e.querySelectorAll("svg").forEach((e=>{
                                e.classList.add("fill-white", "group-hover:fill-gray-300"),
                                e.classList.remove("fill-gray-700", "group-hover:fill-primary-500")
                            }
                            ))
                        }
                        ))))
                    }
                    )))
                }
                ))
            }
            )()
        },
        292: function() {
            (()=>{
                const e = document.querySelector("#preloader");
                e && setTimeout((()=>{
                    e.classList.add("hidden")
                }
                ), 300)
            }
            )()
        },
        859: function() {
            (()=>{
                const e = document.querySelectorAll(".grid-button");
                e && e.forEach((e=>{
                    if (e.classList.contains("grid-active")) {
                        const t = e.dataset.targetGrid;
                        document.querySelectorAll(".grid-content").forEach((e=>{
                            e.getAttribute("id") !== t && e.classList.add("hidden")
                        }
                        ))
                    }
                    e.addEventListener("click", (()=>{
                        const t = e.dataset.targetGrid;
                        document.querySelectorAll(".grid-content").forEach((e=>{
                            e.getAttribute("id") === t ? (e.classList.remove("hidden"),
                            e.classList.add("block")) : (e.classList.add("hidden"),
                            e.classList.remove("block"))
                        }
                        ))
                    }
                    ))
                }
                ))
            }
            )()
        },
        150: function() {
            (()=>{
                const e = document.getElementById("lightOrDarkMode");
                e && e.addEventListener("click", (()=>{
                    const e = document.getElementsByTagName("body")[0];
                    e.classList.contains("dark") ? e.classList.remove("dark") : e.classList.add("dark")
                }
                ))
            }
            )()
        },
        228: function() {
            (()=>{
                function e(e) {
                    const {activeStyle: t, deactiveStyle: a} = e.dataset
                      , s = JSON.parse(JSON.stringify(t))
                      , c = JSON.parse(JSON.stringify(a));
                    return {
                        active: s.split(" "),
                        deactive: c.split(" ")
                    }
                }
                const t = document.querySelectorAll(".tab-button");
                t && t.forEach((t=>{
                    const {active: a, deactive: s} = e(t);
                    t.classList.contains("active") ? t.classList.add(...a) : t.classList.add(...s),
                    t.addEventListener("click", (()=>{
                        const a = t.dataset.tabName
                          , s = t.dataset.targetTab;
                        document.querySelectorAll(".tab-button").forEach((t=>{
                            if (a === t.dataset.tabName) {
                                t.classList.remove("active");
                                const {activeStyle: a, deactiveStyle: s} = t.dataset;
                                if (a && s) {
                                    const {active: a, deactive: s} = e(t);
                                    t.classList.remove(...a),
                                    t.classList.add(...s)
                                }
                            }
                        }
                        )),
                        t.classList.add("active");
                        const {active: c, deactive: r} = e(t);
                        t.classList.remove(...r),
                        t.classList.add(...c),
                        document.querySelectorAll(".tap-panel").forEach((e=>{
                            const t = e.dataset.tabName;
                            a === t && (s !== e.getAttribute("id") ? (e.classList.remove("block"),
                            e.classList.add("hidden")) : (e.classList.remove("hidden"),
                            e.classList.add("block")))
                        }
                        ))
                    }
                    ))
                }
                ))
            }
            )()
        }
    }
      , t = {};
    function a(s) {
        var c = t[s];
        if (void 0 !== c)
            return c.exports;
        var r = t[s] = {
            exports: {}
        };
        return e[s](r, r.exports, a),
        r.exports
    }
    a(215),
    a(919),
    a(733),
    a(150),
    a(855),
    a(859),
    a(292),
    a(228),
    document.querySelectorAll(".checkbox-checked").forEach((e=>{
        e.checked ? e.style = "background-image: url('assets/img/icons/check/color-checked-squire.svg')" : e.style = "",
        e.addEventListener("change", (()=>{
            e.checked ? e.style = "background-image: url('assets/img/icons/check/color-checked-squire.svg')" : e.style = ""
        }
        ))
    }
    ))
}();
