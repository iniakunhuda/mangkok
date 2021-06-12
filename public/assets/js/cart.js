function showAlert(response) {
    if(response.status == 200) {
        let data = response.data;
        if(data.status == 200) {
            swal(
                "Berhasil!",
                data.message,
                "success"
            );
        } else {
            swal(
                "Gagal!",
                data.message,
                "error"
            );
        }
    } else {
        swal(
            "Gagal!",
            "Ada yang salah, silahkan coba lagi atau hubungi administrator!",
            "error"
        );
    }
}

function countCart() {
    let url = API_URL + "cart/count";
    axios.get(url)
    .then(function (response) {
        let count = response.data;
        if(count == 0) {
            $('.total__cart').addClass('hidden');
        } else {
            $('.total__cart').removeClass('hidden');
            $('.total__cart').text(count);
        }
        getTotalBayar();
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });  
}

function addToCart(id, qty, note) {
    let url = API_URL + "cart/add/" + id;
    axios.post(url,{
        qty: qty,
        note: note
    })
    .then(function (response) {
        showAlert(response);
        countCart();
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });  
}

function changeQtyCart(id, qty) {
    let url = API_URL + "cart/change_qty/" + id;

    if((qty < 1) || (qty == undefined)) {
        swal(
            "Gagal!",
            "Jumlah produk yang dibeli minimal 1",
            "error"
        );
        return;
    }

    axios.post(url,{
        qty: qty
    })
    .then(function (response) {
        showAlert(response);
        window.location.reload();
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });
}

function removeFromCart(id) {
    let url = API_URL + "cart/remove/" + id;
    axios.post(url)
    .then(function (response) {
        showAlert(response);
        window.location.reload();
    })
    .catch(function (error) {
        showAlert(error);
    });  
}

function destroyCart() {
    let url = API_URL + "cart/destroy";
    axios.post(url)
    .then(function (response) {
        showAlert(response);
        window.location.reload();
    })
    .catch(function (error) {
        showAlert(error);
    });  
}

function getTotalBayar() {
    let url = API_URL + "cart/total_bayar";
    axios.get(url)
    .then(function (response) {
        let count = response.data;
        $('.total__bayar').removeClass('hidden');
        $('.total__bayar').text(toRupiah(count));
    })
    .catch(function (error) {
        console.log(error);
        showAlert(error);
    });  
}

function toRupiah(angka) {
    angka = angka.toString();
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return (rupiah ? 'Rp. ' + rupiah : '');
}

countCart();