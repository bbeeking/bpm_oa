$(document).ready(function(){gebo_charts.fl_a();gebo_charts.fl_b();gebo_charts.fl_c();gebo_charts.fl_d();gebo_charts.fl_e()});gebo_charts={fl_a:function(){var b=$("#fl_a"),d=[{label:"United States",data:560},{label:"Brazil",data:360},{label:"France",data:320},{label:"Turkey",data:280},{label:"India",data:160}],a=["#eadac8","#dcc1a3","#cea97e","#c09059","#a8763f","#835c31","#5e4223","#392815"];function c(){fl_a_plot=$.plot(b,d,{label:"Visitors by Location",series:{pie:{show:true,innerRadius:.5,highlight:{opacity:.2}}},grid:{hoverable:true,clickable:true},colors:a})}c();b.parent().find(".chart_colors input").click(function(){$(this).attr("checked","checked");var b=$(this).val();if(b=="ch_blue")a=["#b4dbeb","#8cc7e0","#64b4d5","#3ca0ca","#2d83a6","#22637e","#174356","#0c242e"];else if(b=="ch_green")a=["#d7efc1","#bce499","#a2d971","#88ce49","#6eb430","#568c25","#3d641b","#243b10"];else if(b=="ch_brown")a=["#eadac8","#dcc1a3","#cea97e","#c09059","#a8763f","#835c31","#5e4223","#392815"];c()});b.qtip({prerender:true,content:"Loading...",position:{viewport:$(window),target:"mouse",adjust:{x:7}},show:false,style:{classes:"ui-tooltip-shadow ui-tooltip-tipsy",tip:false}});b.on("plothover",function(e,f,b){var h=$(this),a=$(this).qtip(),c,d,g=function(a){return Math.round(a*1e3)/1e3};if(!b){a.cache.point=false;return a.hide(e)}c=a.cache.point;if(c!==b.seriesIndex){percent=parseFloat(b.series.percent).toFixed(2);a.cache.point=b.seriesIndex;d=b.series.label+" ( "+percent+"% )";a.set("content.text",d);a.show(f)}})},fl_b:function(){var a=$("#fl_b"),d=[[1.167606e12,62.02],[1.1676924e12,61.05],[1.1677788e12,58.32],[1.1678652e12,57.35],[1.1679516e12,56.31],[1.1682108e12,55.55],[1.1682972e12,55.64],[1.1683836e12,54.02],[1.16847e12,51.88],[1.1685564e12,52.99],[1.1688156e12,52.99],[1.168902e12,51.21],[1.1689884e12,52.24],[1.1690748e12,50.48],[1.1691612e12,51.99],[1.1694204e12,51.13],[1.1695068e12,55.04],[1.1695932e12,55.37],[1.1696796e12,54.23],[1.169766e12,55.42],[1.1700252e12,54.01],[1.1701116e12,56.97],[1.170198e12,58.14],[1.1702844e12,58.14],[1.1703708e12,59.02],[1.17063e12,58.74],[1.1707164e12,58.88],[1.1708028e12,57.71],[1.1708892e12,59.71],[1.1709756e12,59.89],[1.1712348e12,57.81],[1.1713212e12,59.06],[1.1714076e12,58],[1.171494e12,57.99],[1.1715804e12,59.39],[1.1718396e12,59.39],[1.171926e12,58.07],[1.1720124e12,60.07],[1.1720988e12,61.14],[1.1724444e12,61.39],[1.1725308e12,61.46],[1.1726172e12,61.79],[1.1727036e12,62],[1.17279e12,60.07],[1.1731356e12,60.69],[1.173222e12,61.82],[1.1733084e12,60.05],[1.173654e12,58.91],[1.1737404e12,57.93],[1.1738268e12,58.16],[1.1739132e12,57.55],[1.1739996e12,57.11],[1.1742588e12,56.59],[1.1743452e12,59.61],[1.174518e12,61.69],[1.1746044e12,62.28],[1.17486e12,62.91],[1.1749464e12,62.93],[1.1750328e12,64.03],[1.1751192e12,66.03],[1.1752056e12,65.87],[1.1754648e12,64.64],[1.1756376e12,64.38],[1.175724e12,64.28],[1.1758104e12,64.28],[1.1760696e12,61.51],[1.176156e12,61.89],[1.1762424e12,62.01],[1.1763288e12,63.85],[1.1764152e12,63.63],[1.1766744e12,63.61],[1.1767608e12,63.1],[1.1768472e12,63.13],[1.1769336e12,61.83],[1.17702e12,63.38],[1.1772792e12,64.58],[1.177452e12,65.84],[1.1775384e12,65.06],[1.1776248e12,66.46],[1.177884e12,64.4],[1.1780568e12,63.68],[1.1781432e12,63.19],[1.1782296e12,61.93],[1.1784888e12,61.47],[1.1785752e12,61.55],[1.178748e12,61.81],[1.1788344e12,62.37],[1.1790936e12,62.46],[1.17918e12,63.17],[1.1792664e12,62.55],[1.1793528e12,64.94],[1.1796984e12,66.27],[1.1797848e12,65.5],[1.1798712e12,65.77],[1.1799576e12,64.18],[1.180044e12,65.2],[1.1803896e12,63.15],[1.180476e12,63.49],[1.1805624e12,65.08],[1.180908e12,66.3],[1.1809944e12,65.96],[1.1811672e12,66.93],[1.1812536e12,65.98],[1.1815992e12,65.35],[1.1816856e12,66.26],[1.1818584e12,68],[1.1821176e12,69.09],[1.182204e12,69.1],[1.1822904e12,68.19],[1.1823768e12,68.19],[1.1824632e12,69.14],[1.1827224e12,68.19],[1.1828088e12,67.77],[1.1828952e12,68.97],[1.1829816e12,69.57],[1.183068e12,70.68],[1.1833272e12,71.09],[1.1834136e12,70.92],[1.1835864e12,71.81],[1.1836728e12,72.81],[1.183932e12,72.19],[1.1840184e12,72.56],[1.1841912e12,72.5],[1.1842776e12,74.15],[1.1846232e12,75.05],[1.184796e12,75.92],[1.1848824e12,75.57],[1.1851416e12,74.89],[1.185228e12,73.56],[1.1853144e12,75.57],[1.1854008e12,74.95],[1.1854872e12,76.83],[1.1858328e12,78.21],[1.1859192e12,76.53],[1.1860056e12,76.86],[1.186092e12,76],[1.1864376e12,71.59],[1.1866968e12,71.47],[1.186956e12,71.62],[1.1870424e12,71],[1.1873016e12,71.98],[1.1875608e12,71.12],[1.1876472e12,69.47],[1.1877336e12,69.26],[1.18782e12,69.83],[1.1879064e12,71.09],[1.1881656e12,71.73],[1.1883384e12,73.36],[1.1885112e12,74.04],[1.1888568e12,76.3],[1.189116e12,77.49],[1.1894616e12,78.23],[1.189548e12,79.91],[1.1896344e12,80.09],[1.1897208e12,79.1],[1.18998e12,80.57],[1.1900664e12,81.93],[1.1902392e12,83.32],[1.1903256e12,81.62],[1.1905848e12,80.95],[1.1906712e12,79.53],[1.1907576e12,80.3],[1.190844e12,82.88],[1.1909304e12,81.66],[1.1911896e12,80.24],[1.191276e12,80.05],[1.1913624e12,79.94],[1.1914488e12,81.44],[1.1915352e12,81.22],[1.1917944e12,79.02],[1.1918808e12,80.26],[1.1919672e12,80.3],[1.1920536e12,83.08],[1.19214e12,83.69],[1.1923992e12,86.13],[1.1924856e12,87.61],[1.192572e12,87.4],[1.1926584e12,89.47],[1.1927448e12,88.6],[1.193004e12,87.56],[1.1930904e12,87.56],[1.1931768e12,87.1],[1.1932632e12,91.86],[1.1936124e12,93.53],[1.1936988e12,94.53],[1.1938716e12,95.93],[1.1942172e12,93.98],[1.1943036e12,96.37],[1.1944764e12,95.46],[1.1945628e12,96.32],[1.1950812e12,93.43],[1.1951676e12,95.1],[1.1954268e12,94.64],[1.1955132e12,95.1],[1.1960316e12,97.7],[1.196118e12,94.42],[1.1962044e12,90.62],[1.1962908e12,91.01],[1.1963772e12,88.71],[1.1966364e12,88.32],[1.1968092e12,90.23],[1.196982e12,88.28],[1.1972412e12,87.86],[1.1973276e12,90.02],[1.197414e12,92.25],[1.1975868e12,90.63],[1.197846e12,90.63],[1.1979324e12,90.49],[1.1980188e12,91.24],[1.1981052e12,91.06],[1.1981916e12,90.49],[1.19871e12,96.62],[1.1987964e12,96],[1.199142e12,99.62],[1.1993148e12,99.18],[1.1994012e12,95.09],[1.1996604e12,96.33],[1.1998332e12,95.67],[1.2003516e12,91.9],[1.200438e12,90.84],[1.2005244e12,90.13],[1.2006108e12,90.57],[1.2009564e12,89.21],[1.2010428e12,86.99],[1.2011292e12,89.85],[1.2014748e12,90.99],[1.2015612e12,91.64],[1.2016476e12,92.33],[1.201734e12,91.75],[1.2020796e12,90.02],[1.202166e12,88.41],[1.2022524e12,87.14],[1.2023388e12,88.11],[1.2024252e12,91.77],[1.2027708e12,92.78],[1.2028572e12,93.27],[1.2029436e12,95.46],[1.20303e12,95.46],[1.2032892e12,101.74],[1.203462e12,98.81],[1.203894e12,100.88],[1.2040668e12,99.64],[1.2041532e12,102.59],[1.2042396e12,101.84],[1.2044988e12,99.52],[1.2045852e12,99.52],[1.2046716e12,104.52],[1.204758e12,105.47],[1.2048444e12,105.15],[1.2051036e12,108.75],[1.2052764e12,109.92],[1.2053628e12,110.33],[1.2054492e12,110.21],[1.2057084e12,105.68],[1.2059676e12,101.84],[1.2063132e12,100.86],[1.2063996e12,101.22],[1.206486e12,105.9],[1.2065724e12,107.58],[1.2066588e12,105.62],[1.2069144e12,101.58],[1.2070008e12,100.98],[1.2071736e12,103.83],[1.20726e12,106.23],[1.2076056e12,108.5],[1.2077784e12,110.11],[1.2078648e12,110.14],[1.2082104e12,113.79],[1.2082968e12,114.93],[1.2083832e12,114.86],[1.2087288e12,117.48],[1.2088152e12,118.3],[1.208988e12,116.06],[1.2090744e12,118.52],[1.2093336e12,118.75],[1.20942e12,113.46],[1.2095928e12,112.52],[1.2100248e12,121.84],[1.2101112e12,123.53],[1.2101976e12,123.69],[1.2105432e12,124.23],[1.2106296e12,125.8],[1.210716e12,126.29],[1.211148e12,127.05],[1.2113208e12,129.07],[1.2114936e12,132.19],[1.2118392e12,128.85],[1.2123576e12,127.76],[1.2127032e12,138.54],[1.2129624e12,136.8],[1.2131352e12,136.38],[1.213308e12,134.86],[1.2136536e12,134.01],[1.21374e12,136.68],[1.2139128e12,135.65],[1.214172e12,134.62],[1.2142584e12,134.62],[1.2143448e12,134.62],[1.2144312e12,139.64],[1.2145176e12,140.21],[1.2147768e12,140],[1.2148632e12,140.97],[1.2149496e12,143.57],[1.215036e12,145.29],[1.2153816e12,141.37],[1.215468e12,136.04],[1.2157272e12,146.4],[1.2159864e12,145.18],[1.2160728e12,138.74],[1.2161592e12,134.6],[1.2162456e12,129.29],[1.216332e12,130.65],[1.2166776e12,127.95],[1.2168504e12,127.95],[1.2172824e12,122.19],[1.2174552e12,124.08],[1.2175416e12,125.1],[1.2178008e12,121.41],[1.2178872e12,119.17],[1.2179736e12,118.58],[1.21806e12,120.02],[1.2184056e12,114.45],[1.218492e12,113.01],[1.2185784e12,116],[1.2187512e12,113.77],[1.2190104e12,112.87],[1.2190968e12,114.53],[1.2192696e12,114.98],[1.219356e12,114.98],[1.2197016e12,116.27],[1.219788e12,118.15],[1.2198744e12,115.59],[1.2199608e12,115.46],[1.2203064e12,109.71],[1.2203928e12,109.35],[1.2205656e12,106.23],[1.2208248e12,106.34]],c=[[1.167606e12,.758],[1.1676924e12,.758],[1.1677788e12,.7547],[1.1678652e12,.7549],[1.1679516e12,.7613],[1.168038e12,.7655],[1.1681244e12,.7693],[1.1682108e12,.7694],[1.1682972e12,.7688],[1.1683836e12,.7678],[1.16847e12,.7708],[1.1685564e12,.7727],[1.1686428e12,.7749],[1.1687292e12,.7741],[1.1688156e12,.7741],[1.168902e12,.7732],[1.1689884e12,.7727],[1.1690748e12,.7737],[1.1691612e12,.7724],[1.1692476e12,.7712],[1.169334e12,.772],[1.1694204e12,.7721],[1.1695068e12,.7717],[1.1695932e12,.7704],[1.1696796e12,.769],[1.169766e12,.7711],[1.1698524e12,.774],[1.1699388e12,.7745],[1.1700252e12,.7745],[1.1701116e12,.774],[1.170198e12,.7716],[1.1702844e12,.7713],[1.1703708e12,.7678],[1.1704572e12,.7688],[1.1705436e12,.7718],[1.17063e12,.7718],[1.1707164e12,.7728],[1.1708028e12,.7729],[1.1708892e12,.7698],[1.1709756e12,.7685],[1.171062e12,.7681],[1.1711484e12,.769],[1.1712348e12,.769],[1.1713212e12,.7698],[1.1714076e12,.7699],[1.171494e12,.7651],[1.1715804e12,.7613],[1.1716668e12,.7616],[1.1717532e12,.7614],[1.1718396e12,.7614],[1.171926e12,.7607],[1.1720124e12,.7602],[1.1720988e12,.7611],[1.1721852e12,.7622],[1.1722716e12,.7615],[1.172358e12,.7598],[1.1724444e12,.7598],[1.1725308e12,.7592],[1.1726172e12,.7573],[1.1727036e12,.7566],[1.17279e12,.7567],[1.1728764e12,.7591],[1.1729628e12,.7582],[1.1730492e12,.7585],[1.1731356e12,.7613],[1.173222e12,.7631],[1.1733084e12,.7615],[1.1733948e12,.76],[1.1734812e12,.7613],[1.1735676e12,.7627],[1.173654e12,.7627],[1.1737404e12,.7608],[1.1738268e12,.7583],[1.1739132e12,.7575],[1.1739996e12,.7562],[1.174086e12,.752],[1.1741724e12,.7512],[1.1742588e12,.7512],[1.1743452e12,.7517],[1.1744316e12,.752],[1.174518e12,.7511],[1.1746044e12,.748],[1.1746908e12,.7509],[1.1747772e12,.7531],[1.17486e12,.7531],[1.1749464e12,.7527],[1.1750328e12,.7498],[1.1751192e12,.7493],[1.1752056e12,.7504],[1.175292e12,.75],[1.1753784e12,.7491],[1.1754648e12,.7491],[1.1755512e12,.7485],[1.1756376e12,.7484],[1.175724e12,.7492],[1.1758104e12,.7471],[1.1758968e12,.7459],[1.1759832e12,.7477],[1.1760696e12,.7477],[1.176156e12,.7483],[1.1762424e12,.7458],[1.1763288e12,.7448],[1.1764152e12,.743],[1.1765016e12,.7399],[1.176588e12,.7395],[1.1766744e12,.7395],[1.1767608e12,.7378],[1.1768472e12,.7382],[1.1769336e12,.7362],[1.17702e12,.7355],[1.1771064e12,.7348],[1.1771928e12,.7361],[1.1772792e12,.7361],[1.1773656e12,.7365],[1.177452e12,.7362],[1.1775384e12,.7331],[1.1776248e12,.7339],[1.1777112e12,.7344],[1.1777976e12,.7327],[1.177884e12,.7327],[1.1779704e12,.7336],[1.1780568e12,.7333],[1.1781432e12,.7359],[1.1782296e12,.7359],[1.178316e12,.7372],[1.1784024e12,.736],[1.1784888e12,.736],[1.1785752e12,.735],[1.1786616e12,.7365],[1.178748e12,.7384],[1.1788344e12,.7395],[1.1789208e12,.7413],[1.1790072e12,.7397],[1.1790936e12,.7396],[1.17918e12,.7385],[1.1792664e12,.7378],[1.1793528e12,.7366],[1.1794392e12,.74],[1.1795256e12,.7411],[1.179612e12,.7406],[1.1796984e12,.7405],[1.1797848e12,.7414],[1.1798712e12,.7431],[1.1799576e12,.7431],[1.180044e12,.7438],[1.1801304e12,.7443],[1.1802168e12,.7443],[1.1803032e12,.7443],[1.1803896e12,.7434],[1.180476e12,.7429],[1.1805624e12,.7442],[1.1806488e12,.744],[1.1807352e12,.7439],[1.1808216e12,.7437],[1.180908e12,.7437],[1.1809944e12,.7429],[1.1810808e12,.7403],[1.1811672e12,.7399],[1.1812536e12,.7418],[1.18134e12,.7468],[1.1814264e12,.748],[1.1815128e12,.748],[1.1815992e12,.749],[1.1816856e12,.7494],[1.181772e12,.7522],[1.1818584e12,.7515],[1.1819448e12,.7502],[1.1820312e12,.7472],[1.1821176e12,.7472],[1.182204e12,.7462],[1.1822904e12,.7455],[1.1823768e12,.7449],[1.1824632e12,.7467],[1.1825496e12,.7458],[1.182636e12,.7427],[1.1827224e12,.7427],[1.1828088e12,.743],[1.1828952e12,.7429],[1.1829816e12,.744],[1.183068e12,.743],[1.1831544e12,.7422],[1.1832408e12,.7388],[1.1833272e12,.7388],[1.1834136e12,.7369],[1.1835e12,.7345],[1.1835864e12,.7345],[1.1836728e12,.7345],[1.1837592e12,.7352],[1.1838456e12,.7341],[1.183932e12,.7341],[1.1840184e12,.734],[1.1841048e12,.7324],[1.1841912e12,.7272],[1.1842776e12,.7264],[1.184364e12,.7255],[1.1844504e12,.7258],[1.1845368e12,.7258],[1.1846232e12,.7256],[1.1847096e12,.7257],[1.184796e12,.7247],[1.1848824e12,.7243],[1.1849688e12,.7244],[1.1850552e12,.7235],[1.1851416e12,.7235],[1.185228e12,.7235],[1.1853144e12,.7235],[1.1854008e12,.7262],[1.1854872e12,.7288],[1.1855736e12,.7301],[1.18566e12,.7337],[1.1857464e12,.7337],[1.1858328e12,.7324],[1.1859192e12,.7297],[1.1860056e12,.7317],[1.186092e12,.7315],[1.1861784e12,.7288],[1.1862648e12,.7263],[1.1863512e12,.7263],[1.1864376e12,.7242],[1.186524e12,.7253],[1.1866104e12,.7264],[1.1866968e12,.727],[1.1867832e12,.7312],[1.1868696e12,.7305],[1.186956e12,.7305],[1.1870424e12,.7318],[1.1871288e12,.7358],[1.1872152e12,.7409],[1.1873016e12,.7454],[1.187388e12,.7437],[1.1874744e12,.7424],[1.1875608e12,.7424],[1.1876472e12,.7415],[1.1877336e12,.7419],[1.18782e12,.7414],[1.1879064e12,.7377],[1.1879928e12,.7355],[1.1880792e12,.7315],[1.1881656e12,.7315],[1.188252e12,.732],[1.1883384e12,.7332],[1.1884248e12,.7346],[1.1885112e12,.7328],[1.1885976e12,.7323],[1.188684e12,.734],[1.1887704e12,.734],[1.1888568e12,.7336],[1.1889432e12,.7351],[1.1890296e12,.7346],[1.189116e12,.7321],[1.1892024e12,.7294],[1.1892888e12,.7266],[1.1893752e12,.7266],[1.1894616e12,.7254],[1.189548e12,.7242],[1.1896344e12,.7213],[1.1897208e12,.7197],[1.1898072e12,.7209],[1.1898936e12,.721],[1.18998e12,.721],[1.1900664e12,.721],[1.1901528e12,.7209],[1.1902392e12,.7159],[1.1903256e12,.7133],[1.190412e12,.7105],[1.1904984e12,.7099],[1.1905848e12,.7099],[1.1906712e12,.7093],[1.1907576e12,.7093],[1.190844e12,.7076],[1.1909304e12,.707],[1.1910168e12,.7049],[1.1911032e12,.7012],[1.1911896e12,.7011],[1.191276e12,.7019],[1.1913624e12,.7046],[1.1914488e12,.7063],[1.1915352e12,.7089],[1.1916216e12,.7077],[1.191708e12,.7077],[1.1917944e12,.7077],[1.1918808e12,.7091],[1.1919672e12,.7118],[1.1920536e12,.7079],[1.19214e12,.7053],[1.1922264e12,.705],[1.1923128e12,.7055],[1.1923992e12,.7055],[1.1924856e12,.7045],[1.192572e12,.7051],[1.1926584e12,.7051],[1.1927448e12,.7017],[1.1928312e12,.7],[1.1929176e12,.6995],[1.193004e12,.6994],[1.1930904e12,.7014],[1.1931768e12,.7036],[1.1932632e12,.7021],[1.1933496e12,.7002],[1.193436e12,.6967],[1.1935224e12,.695],[1.1936124e12,.695],[1.1936988e12,.6939],[1.1937852e12,.694],[1.1938716e12,.6922],[1.193958e12,.6919],[1.1940444e12,.6914],[1.1941308e12,.6894],[1.1942172e12,.6891],[1.1943036e12,.6904],[1.19439e12,.689],[1.1944764e12,.6834],[1.1945628e12,.6823],[1.1946492e12,.6807],[1.1947356e12,.6815],[1.194822e12,.6815],[1.1949084e12,.6847],[1.1949948e12,.6859],[1.1950812e12,.6822],[1.1951676e12,.6827],[1.195254e12,.6837],[1.1953404e12,.6823],[1.1954268e12,.6822],[1.1955132e12,.6822],[1.1955996e12,.6792],[1.195686e12,.6746],[1.1957724e12,.6735],[1.1958588e12,.6731],[1.1959452e12,.6742],[1.1960316e12,.6744],[1.196118e12,.6739],[1.1962044e12,.6731],[1.1962908e12,.6761],[1.1963772e12,.6761],[1.1964636e12,.6785],[1.19655e12,.6818],[1.1966364e12,.6836],[1.1967228e12,.6823],[1.1968092e12,.6805],[1.1968956e12,.6793],[1.196982e12,.6849],[1.1970684e12,.6833],[1.1971548e12,.6825],[1.1972412e12,.6825],[1.1973276e12,.6816],[1.197414e12,.6799],[1.1975004e12,.6813],[1.1975868e12,.6809],[1.1976732e12,.6868],[1.1977596e12,.6933],[1.197846e12,.6933],[1.1979324e12,.6945],[1.1980188e12,.6944],[1.1981052e12,.6946],[1.1981916e12,.6964],[1.198278e12,.6965],[1.1983644e12,.6956],[1.1984508e12,.6956],[1.1985372e12,.695],[1.1986236e12,.6948],[1.19871e12,.6928],[1.1987964e12,.6887],[1.1988828e12,.6824],[1.1989692e12,.6794],[1.1990556e12,.6794],[1.199142e12,.6803],[1.1992284e12,.6855],[1.1993148e12,.6824],[1.1994012e12,.6791],[1.1994876e12,.6783],[1.199574e12,.6785],[1.1996604e12,.6785],[1.1997468e12,.6797],[1.1998332e12,.68],[1.1999196e12,.6803],[1.200006e12,.6805],[1.2000924e12,.676],[1.2001788e12,.677],[1.2002652e12,.677],[1.2003516e12,.6736],[1.200438e12,.6726],[1.2005244e12,.6764],[1.2006108e12,.6821],[1.2006972e12,.6831],[1.2007836e12,.6842],[1.20087e12,.6842],[1.2009564e12,.6887],[1.2010428e12,.6903],[1.2011292e12,.6848],[1.2012156e12,.6824],[1.201302e12,.6788],[1.2013884e12,.6814],[1.2014748e12,.6814],[1.2015612e12,.6797],[1.2016476e12,.6769],[1.201734e12,.6765],[1.2018204e12,.6733],[1.2019068e12,.6729],[1.2019932e12,.6758],[1.2020796e12,.6758],[1.202166e12,.675],[1.2022524e12,.678],[1.2023388e12,.6833],[1.2024252e12,.6856],[1.2025116e12,.6903],[1.202598e12,.6896],[1.2026844e12,.6896],[1.2027708e12,.6882],[1.2028572e12,.6879],[1.2029436e12,.6862],[1.20303e12,.6852],[1.2031164e12,.6823],[1.2032028e12,.6813],[1.2032892e12,.6813],[1.2033756e12,.6822],[1.203462e12,.6802],[1.2035484e12,.6802],[1.2036348e12,.6784],[1.2037212e12,.6748],[1.2038076e12,.6747],[1.203894e12,.6747],[1.2039804e12,.6748],[1.2040668e12,.6733],[1.2041532e12,.665],[1.2042396e12,.6611],[1.204326e12,.6583],[1.2044124e12,.659],[1.2044988e12,.659],[1.2045852e12,.6581],[1.2046716e12,.6578],[1.204758e12,.6574],[1.2048444e12,.6532],[1.2049308e12,.6502],[1.2050172e12,.6514],[1.2051036e12,.6514],[1.20519e12,.6507],[1.2052764e12,.651],[1.2053628e12,.6489],[1.2054492e12,.6424],[1.2055356e12,.6406],[1.205622e12,.6382],[1.2057084e12,.6382],[1.2057948e12,.6341],[1.2058812e12,.6344],[1.2059676e12,.6378],[1.206054e12,.6439],[1.2061404e12,.6478],[1.2062268e12,.6481],[1.2063132e12,.6481],[1.2063996e12,.6494],[1.206486e12,.6438],[1.2065724e12,.6377],[1.2066588e12,.6329],[1.2067452e12,.6336],[1.2068316e12,.6333],[1.2069144e12,.6333],[1.2070008e12,.633],[1.2070872e12,.6371],[1.2071736e12,.6403],[1.20726e12,.6396],[1.2073464e12,.6364],[1.2074328e12,.6356],[1.2075192e12,.6356],[1.2076056e12,.6368],[1.207692e12,.6357],[1.2077784e12,.6354],[1.2078648e12,.632],[1.2079512e12,.6332],[1.2080376e12,.6328],[1.208124e12,.6331],[1.2082104e12,.6342],[1.2082968e12,.6321],[1.2083832e12,.6302],[1.2084696e12,.6278],[1.208556e12,.6308],[1.2086424e12,.6324],[1.2087288e12,.6324],[1.2088152e12,.6307],[1.2089016e12,.6277],[1.208988e12,.6269],[1.2090744e12,.6335],[1.2091608e12,.6392],[1.2092472e12,.64],[1.2093336e12,.6401],[1.20942e12,.6396],[1.2095064e12,.6407],[1.2095928e12,.6423],[1.2096792e12,.6429],[1.2097656e12,.6472],[1.209852e12,.6485],[1.2099384e12,.6486],[1.2100248e12,.6467],[1.2101112e12,.6444],[1.2101976e12,.6467],[1.210284e12,.6509],[1.2103704e12,.6478],[1.2104568e12,.6461],[1.2105432e12,.6461],[1.2106296e12,.6468],[1.210716e12,.6449],[1.2108024e12,.647],[1.2108888e12,.6461],[1.2109752e12,.6452],[1.2110616e12,.6422],[1.211148e12,.6422],[1.2112344e12,.6425],[1.2113208e12,.6414],[1.2114072e12,.6366],[1.2114936e12,.6346],[1.21158e12,.635],[1.2116664e12,.6346],[1.2117528e12,.6346],[1.2118392e12,.6343],[1.2119256e12,.6346],[1.212012e12,.6379],[1.2120984e12,.6416],[1.2121848e12,.6442],[1.2122712e12,.6431],[1.2123576e12,.6431],[1.212444e12,.6435],[1.2125304e12,.644],[1.2126168e12,.6473],[1.2127032e12,.6469],[1.2127896e12,.6386],[1.212876e12,.6356],[1.2129624e12,.634],[1.2130488e12,.6346],[1.2131352e12,.643],[1.2132216e12,.6452],[1.213308e12,.6467],[1.2133944e12,.6506],[1.2134808e12,.6504],[1.2135672e12,.6503],[1.2136536e12,.6481],[1.21374e12,.6451],[1.2138264e12,.645],[1.2139128e12,.6441],[1.2139992e12,.6414],[1.2140856e12,.6409],[1.214172e12,.6409],[1.2142584e12,.6428],[1.2143448e12,.6431],[1.2144312e12,.6418],[1.2145176e12,.6371],[1.214604e12,.6349],[1.2146904e12,.6333],[1.2147768e12,.6334],[1.2148632e12,.6338],[1.2149496e12,.6342],[1.215036e12,.632],[1.2151224e12,.6318],[1.2152088e12,.637],[1.2152952e12,.6368],[1.2153816e12,.6368],[1.215468e12,.6383],[1.2155544e12,.6371],[1.2156408e12,.6371],[1.2157272e12,.6355],[1.2158136e12,.632],[1.2159e12,.6277],[1.2159864e12,.6276],[1.2160728e12,.6291],[1.2161592e12,.6274],[1.2162456e12,.6293],[1.216332e12,.6311],[1.2164184e12,.631],[1.2165048e12,.6312],[1.2165912e12,.6312],[1.2166776e12,.6304],[1.216764e12,.6294],[1.2168504e12,.6348],[1.2169368e12,.6378],[1.2170232e12,.6368],[1.2171096e12,.6368],[1.217196e12,.6368],[1.2172824e12,.636],[1.2173688e12,.637],[1.2174552e12,.6418],[1.2175416e12,.6411],[1.217628e12,.6435],[1.2177144e12,.6427],[1.2178008e12,.6427],[1.2178872e12,.6419],[1.2179736e12,.6446],[1.21806e12,.6468],[1.2181464e12,.6487],[1.2182328e12,.6594],[1.2183192e12,.6666],[1.2184056e12,.6666],[1.218492e12,.6678],[1.2185784e12,.6712],[1.2186648e12,.6705],[1.2187512e12,.6718],[1.2188376e12,.6784],[1.218924e12,.6811],[1.2190104e12,.6811],[1.2190968e12,.6794],[1.2191832e12,.6804],[1.2192696e12,.6781],[1.219356e12,.6756],[1.2194424e12,.6735],[1.2195288e12,.6763],[1.2196152e12,.6762],[1.2197016e12,.6777],[1.219788e12,.6815],[1.2198744e12,.6802],[1.2199608e12,.678],[1.2200472e12,.6796],[1.2201336e12,.6817],[1.22022e12,.6817],[1.2203064e12,.6832],[1.2203928e12,.6877],[1.2204792e12,.6912],[1.2205656e12,.6914],[1.220652e12,.7009],[1.2207384e12,.7012],[1.2208248e12,.701],[1.2209112e12,.7005]];function b(b,a){return b.toFixed(a.tickDecimals)+"\u20ac"}fl_b_plot=$.plot(a,[{data:d,label:"Oil price ($)"},{data:c,label:"USD/EUR exchange rate",yaxis:2}],{series:{lines:{show:true}},xaxes:[{mode:"time"}],yaxes:[{min:0},{tickFormatter:b,position:"right"}],grid:{hoverable:true,autoHighlight:false},multihighlight:{mode:"x"},legend:{position:"sw"},colors:["#8cc7e0","#2d83a6"]});a.qtip({prerender:true,content:"Loading...",position:{viewport:$(window),target:"mouse",adjust:{x:16,y:24}},show:false,style:{classes:"ui-tooltip-shadow ui-tooltip-tipsy",tip:false}});a.on("multihighlighted",function(j,i,b){var m=$(this),a=$(this).qtip(),c,l=function(a){return Math.round(a*1e3)/1e3};if(j.isTrigger){var k=fl_b_plot.getData()[0].data[b[0].dataIndex],g=moment(k[0]).format("MMM Do 'YY"),f=fl_b_plot.getData()[0].label,d=fl_b_plot.getData()[1].label,h=fl_b_plot.getData()[0].data[b[0].dataIndex],e=fl_b_plot.getData()[1].data[b[1].dataIndex];c=g+"<br/>"+f+": "+h[1]+"<br/>"+d+": "+e[1];a.set("content.text",c);a.elements.tooltip.stop(1,1);a.show(i)}else a.hide()})},fl_c:function(){for(var c=$("#fl_c"),d=[[(new Date("05/23/2012")).getTime(),350],[(new Date("05/24/2012")).getTime(),422],[(new Date("05/25/2012")).getTime(),550],[(new Date("05/26/2012")).getTime(),608],[(new Date("05/27/2012")).getTime(),681],[(new Date("05/28/2012")).getTime(),591],[(new Date("05/29/2012")).getTime(),510]],e=[[(new Date("05/23/2012")).getTime(),1200],[(new Date("05/24/2012")).getTime(),1400],[(new Date("05/25/2012")).getTime(),1500],[(new Date("05/26/2012")).getTime(),1200],[(new Date("05/27/2012")).getTime(),1340],[(new Date("05/28/2012")).getTime(),1421],[(new Date("05/29/2012")).getTime(),1510]],f=[[(new Date("05/23/2012")).getTime(),120],[(new Date("05/24/2012")).getTime(),100],[(new Date("05/26/2012")).getTime(),140],[(new Date("05/27/2012")).getTime(),153],[(new Date("05/28/2012")).getTime(),184],[(new Date("05/29/2012")).getTime(),226]],a=0;a<d.length;++a)d[a][0]+=60*120*1e3;for(var a=0;a<e.length;++a)e[a][0]+=60*120*1e3;for(var a=0;a<f.length;++a)f[a][0]+=60*120*1e3;var b=[];b.push({label:"Data 1",data:d,bars:{show:true,barWidth:60*220*1e3,order:1,lineWidth:2,fill:1}});b.push({label:"Data 2",data:e,bars:{show:true,barWidth:60*220*1e3,order:2,fill:1}});b.push({label:"Data 3",data:f,bars:{show:true,barWidth:60*220*1e3,order:3,fill:1}});var g={grid:{hoverable:true},xaxis:{mode:"time",minTickSize:[1,"day"],autoscaleMargin:.1},colors:["#b4dbeb","#8cc7e0","#64b4d5","#3ca0ca","#2d83a6","#22637e","#174356","#0c242e"]};fl_c_plot=$.plot(c,b,g);c.qtip({prerender:true,content:"Loading...",position:{viewport:$(window),target:"mouse",adjust:{x:7}},show:false,style:{classes:"ui-tooltip-shadow ui-tooltip-tipsy",tip:false}});c.on("plothover",function(f,e,b){var h=$(this),a=$(this).qtip(),c,d,g=function(a){return Math.round(a*1e3)/1e3};if(!b){a.cache.point=false;return a.hide(f)}c=a.cache.point;if(c!==b.seriesIndex){a.cache.point=b.seriesIndex;d=b.series.label+": "+g(b.datapoint[1]);a.set("content.text",d);a.elements.tooltip.stop(1,1);a.show(e)}})},fl_d:function(){for(var b=$("#fl_d"),c=[[(new Date("05/23/2012")).getTime(),350],[(new Date("05/24/2012")).getTime(),422],[(new Date("05/25/2012")).getTime(),550],[(new Date("05/26/2012")).getTime(),608],[(new Date("05/27/2012")).getTime(),681],[(new Date("05/28/2012")).getTime(),591],[(new Date("05/29/2012")).getTime(),510]],d=[[(new Date("05/23/2012")).getTime(),1200],[(new Date("05/24/2012")).getTime(),1400],[(new Date("05/25/2012")).getTime(),1500],[(new Date("05/26/2012")).getTime(),1200],[(new Date("05/27/2012")).getTime(),1340],[(new Date("05/28/2012")).getTime(),1421],[(new Date("05/29/2012")).getTime(),1510]],a=0;a<c.length;++a)c[a][0]+=60*120*1e3;for(var a=0;a<d.length;++a)d[a][0]+=60*120*1e3;var e={series:{curvedLines:{active:true}},yaxes:[{min:0},{position:"right"}],xaxis:{mode:"time",minTickSize:[1,"day"],autoscaleMargin:.1},grid:{hoverable:true},legend:{position:"nw"},colors:["#8cc7e0","#3ca0ca"]};fl_d_plot=$.plot(b,[{data:c,label:"Unique visitors",bars:{show:true,barWidth:60*360*1e3,align:"center",fill:1}},{data:d,label:"Sale",curvedLines:{active:true,show:true,lineWidth:3},yaxis:2,points:{show:true},stack:null}],e);b.qtip({prerender:true,content:"Loading...",position:{viewport:$(window),target:"mouse",adjust:{x:7}},show:false,style:{classes:"ui-tooltip-shadow ui-tooltip-tipsy",tip:false}});b.on("plothover",function(f,e,b){var h=$(this),a=$(this).qtip(),c,d,g=function(a){return Math.round(a*1e3)/1e3};if(!b){a.cache.point=false;return a.hide(f)}c=a.cache.point;if(c!==b.seriesIndex){a.cache.point=b.seriesIndex;d=b.series.label+": "+g(b.datapoint[1]);a.set("content.text",d);a.elements.tooltip.stop(1,1);a.show(e)}})},fl_e:function(){var a=$("#fl_e"),d=[{label:"Men",data:[["0-4",1302329],["5-9",2328460],["10-14",1090872],["15-19",1158983],["20-24",1339972],["25-29",1667557],["30-34",2072016],["35-39",2117802],["40-44",1945472],["45-49",1746832],["50-54",1521581],["55-59",1282107],["60-64",1173175],["65-69",990405],["70-74",800274],["75-79",732383],["80-84",477597],["85-89",241915],["90-94",69987],["95-99",15332],["100+",2060]]},{label:"Women",data:[["0-4",1224757],["5-9",1129454],["10-14",1030163],["15-19",1084773],["20-24",1220879],["25-29",1527463],["30-34",1960767],["35-39",2043411],["40-44",1904849],["45-49",1747880],["50-54",1551797],["55-59",1330712],["60-64",1262386],["65-69",1107169],["70-74",980444],["75-79",994168],["80-84",764408],["85-89",475115],["90-94",171929],["95-99",40284],["100+",5498]],pyramid:{direction:"L"}}],c={series:{pyramid:{show:true}},xaxis:{tickFormatter:function(a){return a/1e3+" K"}},grid:{hoverable:true},colors:["#8cc7e0","#3ca0ca"]};fl_e_plot=$.plot(a,d,c);a.qtip({prerender:true,content:"Loading...",position:{viewport:$(window),target:"mouse",adjust:{x:7,y:7}},show:false,style:{classes:"ui-tooltip-shadow ui-tooltip-tipsy",tip:false}});function b(a){return String(a).replace(/^\d+(?=.|$)/,function(a){return a.replace(/(?=(?:\d{3})+$)(?!^)/g,",")})}a.on("plothover",function(g,i,a){var k=$(this),c=$(this).qtip(),d,e,j=function(a){return Math.round(a*1e3)/1e3};if(!a){c.cache.point=false;return c.hide(g)}d=c.cache.point;if(d!==a.seriesIndex){c.cache.point=a.seriesIndex;var f=a.series.data[a.dataIndex],h=a.series.yaxis.ticks[f[0]].label;e=a.series.label+" with age in "+h+" = "+b(f[1]);c.set("content.text",e);c.elements.tooltip.stop(1,1);c.show(i)}})}}