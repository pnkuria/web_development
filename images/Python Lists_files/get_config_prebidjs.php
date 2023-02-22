(function() {    
    if(typeof window.top._pbjsGlobals !== 'undefined'){
        if(window.top._pbjsGlobals.length > 0){
            window.top._pbjsGlobals.forEach(function(global_variable_pbjs_name){
                
                const pbjs_object = window.top[global_variable_pbjs_name];
                
                var smilewanted_called = false;
                
                if(pbjs_object.adUnits){
                    pbjs_object.adUnits.forEach(function(ad_unit){
                        if(ad_unit['bids']){
                            ad_unit['bids'].forEach(function(bid){
                                if(bid.bidder === 'smilewanted'){
                                    smilewanted_called = true;
                                }
                            });
                        }
                    });
                }
                
                if(smilewanted_called){
                    
                    var module_user_sync = false;
                    var user_sync_delay = 0;
                    var module_consent_management = false;
                    var partner_smilewanted_authorized = false;
                    var position_type_infeed_enabled = false;
                    
                    if(pbjs_object.getConfig()){
                        
                        const pbjs_config = pbjs_object.getConfig();
                        var pbjs_config_json = JSON.stringify(pbjs_object.getConfig());
                        
                        if(pbjs_config.consentManagement){
                            module_consent_management = true;
                        }
                        
                        if(pbjs_config.userSync){
                            
                            module_user_sync = true;
                            user_sync_delay = pbjs_config.userSync.syncDelay;
                            
                            if(pbjs_config.userSync.filterSettings.iframe){
                                if(pbjs_config.userSync.filterSettings.iframe.filter === 'include'){
                                    if(typeof(pbjs_config.userSync.filterSettings.iframe.bidders) === 'object'){
                                        partner_smilewanted_authorized = pbjs_config.userSync.filterSettings.iframe.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.iframe.bidders === '*'){
                                            partner_smilewanted_authorized = true;
                                        }
                                    }   
                                }else if(pbjs_config.userSync.filterSettings.iframe.filter === 'exclude'){
                                    if(typeof(pbjs_config.userSync.filterSettings.iframe.bidders) === 'object'){
                                        partner_smilewanted_authorized = !pbjs_config.userSync.filterSettings.iframe.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.iframe.bidders === '*'){
                                            partner_smilewanted_authorized = false;
                                        }
                                    }
                                }   
                            }
                            
                            if(pbjs_config.userSync.filterSettings.all){
                                if(pbjs_config.userSync.filterSettings.all.filter === 'include'){
                                    if(typeof(pbjs_config.userSync.filterSettings.all.bidders) === 'object'){
                                        partner_smilewanted_authorized = pbjs_config.userSync.filterSettings.all.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.all.bidders === '*'){
                                            partner_smilewanted_authorized = true;
                                        }
                                    }   
                                }else if(pbjs_config.userSync.filterSettings.all.filter === 'exclude'){
                                    if(typeof(pbjs_config.userSync.filterSettings.all.bidders) === 'object'){
                                        partner_smilewanted_authorized = !pbjs_config.userSync.filterSettings.all.bidders.includes('smilewanted');
                                    }else{
                                        if(pbjs_config.userSync.filterSettings.all.bidders === '*'){
                                            partner_smilewanted_authorized = false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    if(pbjs_object.adUnits){
                        pbjs_object.adUnits.forEach(function(ad_unit){
                            if(ad_unit['bids']){
                                ad_unit['bids'].forEach(function(bid){
                                    if(bid.bidder === 'smilewanted'){
                                        if(bid.params['positionType']){
                                            position_type_infeed_enabled = bid.params['positionType'].includes("infeed");
                                        }
                                    }
                                });
                            }
                        });
                    }
                    
                    var data_push_event = {};
                    
                    data_push_event[0] = 'avo9KN10mgy1edbPvXPWlnIv6IcnRY0IUKCRFmF6CRIc0PAmS0FJiEZ2NiCe/bBsqT8qu8lKT7UdrnA0QpQ3PVNlLYgWzA5sZPW1L0MIBdTdBmho4rORacBFbca0f/YAKxdBP9pvfXaRy3dxx9nj+XkWvVXk7bbpF2cM/DV6nSIz08/DqUJ1vL/kWKYR9MyzM/GxoMduhv+r3jj5ux73dfAeMJMx96PhA9f933Wxot9rXmPaVcPuD1t6G0WMxqtkwb0vJ0o5nt8moym9y2vHLYOHpOxuSo4OpCw5UY5mSU/gHN8LSnRglYCEWnIC8L81/ot5RmmNgSSyOGCxXwDfXey7jMFLkHrvQiUCVo12WJk89XtpYMCxC2MmudmOCMi3UFEI/j+OaIapi0WilSYJM4BI7sB8fPm17KmEgoHg1rI8e7DKgKuTm1Lt15mRw1oz6S50yABdOSAq5eHQ08soKxAKGDgrTDXSq4liP8wrqAo4SrmUKQxFyWhT572wFqqz7WifAR25FlJZFf/tz3tyS/C368ZWgi5DGwHjntDFrZ5Ij3SibN0DDCiRdVgazkXA6ObcldW6CmFtIpXPcjtfUOaMxkn+yf4lt5i/axcYaeIYdkI+InA1UtJA/pK8NzNQvN1D9BIxS7Pyg9cVyYusx38gjNqEXgYko0Sb2plDUXqCMqfceSelXJBs6FDBwuwyjAs2xpm8caFd80RJWls1gPAQixme+3UUHX405k0FfC+6O5QoomOtGgIpGKT8KhCHNLz+hyQh3Me7FRSKjm4BAXL2Ljsr1h/2tDyWc+7bYNlYXn++Ryksv+XurRBFRE2PANfXNAUTwF3GuoMuBeperBGDpAZsji+rgeeZZ82AL5hGK0apRrls7T3ETFUoT1us00BA3upOaqZTcmc1njD+1XB6aKWyZGk/X+vkLO7alVIvv0dFgDV6I2Te7pE1MgT5V3A6y8VRF/54Iw7CuqTbTW2v3/fjE8hBI4XrZ1HwR2N/1fjQBzV1w3KdK/iqvGDX+sX8r1z5fZoKzWH0dEs8lMNYuuRQWuTT80Z/EiIUcusiL6A5tedyMKYEl82w58GQy8I+xFTd8Ln4IfzlI5/Yv9NixKDm2QGi5LMcweT+9eBexvJ+RwT/npWezeqxPfUmaBB/bi84vd29lF38AbyRRuLWaIMlFPUx3lMNs44fBuRvbHBnEoC0EWJr7NMe1Re7b7wwTGrvmzI6K+LkD8Sby5ypzm5oRBqyzKM7rY+3O04=';
                    data_push_event[1] = global_variable_pbjs_name;
                    data_push_event[2] = module_user_sync;
                    data_push_event[3] = partner_smilewanted_authorized;
                    data_push_event[4] = module_consent_management;
                    data_push_event[5] = user_sync_delay;
                    data_push_event[6] = position_type_infeed_enabled;

                    // Envoie des données en POST
                    navigator.sendBeacon('https://prebid.smilewanted.com/track/prebid_js_config.php', JSON.stringify(data_push_event));
                }
            });
        }
    }    
}());
