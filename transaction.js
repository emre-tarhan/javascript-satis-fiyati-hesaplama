    // Ürününüzün geliş fiyatı
    var gelis = 80;
    // Ürününüzün paketleme vs giderleri
    var gider = 5;
    // Ürününüzün kâr oranı (Birim cinsinden, yüzde cinsinden değil)
    var kar = 10;
    // Ürününüzün kargo ücreti
    var kargo = 5;
    
    // Bu aşamada ürünümüzün genel maliyetini belirtmiş olduk.
    //Daha kolay anlaşılması için geliş, paketleme, kâr ve kargo ücreti toplamını 100₺ olarak belirledim.
  
    // Pazaryerinin aldığı komisyon (% cinsinden)
    var komisyon = 10;
    // Bu sayı, komisyon oranı var ise hesaplamanızı maddi zarara uğramadan yapmanız için gereklidir.
    var degisken = 1.18125
    
    // Doğru satış fiyatımızı hesaplayabiliriz
    var satisFiyati = (gelis + gider + kar + kargo) + (((gelis + gider + kar + kargo) * ((komisyon) * degisken)) / 100);
  
