var SiteUrl = "http://www.demo.feiwa.org/mall";
var ApiUrl = "http://www.demo.feiwa.org/mo_bile";
var pagesize = 10;
var WapSiteUrl = "http://www.demo.feiwa.org/wap";
var IOSSiteUrl = "https://itunes.apple.com/us/app/";
var AndroidSiteUrl = "http://www.feiwa.org/download/app/AndroidFeiWa2014Moblie.apk";

// auto url detection
(function() {
    var m = /^(https?:\/\/.+)\/wap/i.exec(location.href);
    if (m && m.length > 1) {
        SiteUrl = m[1] + '/mall';
        ApiUrl = m[1] + '/mo_bile';
        WapSiteUrl = m[1] + '/wap';
    }
})();
