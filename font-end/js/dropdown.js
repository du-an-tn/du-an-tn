function hamDropdown() {
    document.querySelector(".box-chon").classList.toggle("hienThi");
    console.log('thành công');
   }
   
   window.onclick = function(e) {
     if (!e.target.matches('.timkiem')) {
     var noiDungDropdown = document.querySelector(".box-chon");
       if (noiDungDropdown.classList.contains('hienThi')) {
         noiDungDropdown.classList.remove('hienThi');
       }
     }
   }
   