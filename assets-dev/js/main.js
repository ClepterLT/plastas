import filterByCatInit from "./catFiltration";
import mobileNav from "./mobileNav";
import slider from "./slider";

(function($) {
    $(document).ready(function() {
        mobileNav();
        slider();
        filterByCatInit();
    })
})(jQuery);
