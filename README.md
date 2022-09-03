# Javascript Komisyon Oranına Uygun Satış Fiyatı Hesaplama
#### Javascript ile e-Ticaret platformlarında sattığınız ürününüzün doğru satış fiyatını hesaplama

###### Çoğu satıcı komisyon oranına göre hesaplamayı tam anlayamadığı veya göz ardı ettiği için pazaryerlerinin komisyon oranları bu satıcıları maddi zarara uğratmaktadır.
Bunu basit bir işlemle örnekleyelim;
#
Örneğin ürünümüzün,
###### Geliş fiyatı = 80₺
###### Paketleme ve diğer giderler = 5₺
###### Kargo ücreti = 5₺
###### Kâr = 10₺
Böylelikle ürünümüzün komisyon hariç fiyatı 100₺ oldu  
  
###### Komisyonumuzu, örneğin daha kolay anlaşılabilmesi için 10% olarak alalım.

###### ``100₺``'nin ``10%``'unu ``10₺`` olarak elde ediyoruz. Peki buna bakarak ürünümüzü komisyon dahil ``110₺`` olarak fiyatlandırmak doğru mu? 
### HAYIR

Ürünümüzü ``110₺`` olarak fiyatlandırdık. Bakalım pazaryeri ürünümüzden kaç ₺ komisyon alıyor?  
###### 100/(110*10) = 11₺  
###### Gördüğünüz üzere komisyonunu 10₺ olarak hesapladığımız üründen pazaryeri bizden ``11₺`` komisyon alıyor, yani ``1₺ zarar`` etmiş oluyoruz.  
###### Çünkü pazaryeri komisyonu ``110₺`` üzerinden alıyor.
#
Bunun önüne geçmek için çıkan sonucu **``1.18125``** sayısı ile çarptığımız takdirde belirlediğimiz kâr oranını tam olarak alabiliyoruz.  
#
Fonksiyonumda belirttiğim örneğin bir projemde yer almış hali, php ve javascript ile yazılmış kaynak kodları ``example`` klasöründe mevcut.

![live example](https://user-images.githubusercontent.com/106887102/188278386-91da3d00-adcf-43f3-967d-62e9d8a8bfc3.png)
