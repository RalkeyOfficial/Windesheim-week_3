var ProductImg = document.getElementById("ProductImg");
var smallImg = document.getElementsByClassName("small-img")

smallImg[0].onclick =function()
{
    ProductImg.src = smallImg[0].src;
}
smallImg[1].onclick =function()
{
    ProductImg.src = smallImg[1].src;
}