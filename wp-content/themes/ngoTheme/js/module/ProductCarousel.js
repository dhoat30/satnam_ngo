let $ = jQuery; 

class ProductCarousel{
    constructor(){
        this.events(); 
    }
    events(){
        $(document).on('click', '.ex-product-nav .nav-item a', this.navClick);
    }
    navClick(e){
        console.log(e); 
       
        let clickID = e.target.id;
        $('.ex-product-nav .nav-item a').removeClass('active');
        $(e.target).addClass('active');
        //$(e.target).addClass('active');
        console.log(clickID)
        if(clickID == 'special-tab'){
            $('.tab-pane').removeClass('active');
            $('.tab-pane').removeClass('show');
            $('.tab-pane').css('display', 'none');

            $('#special').addClass('active show'); 
            $('#special').css('display', 'block'); 
             
        }
        if(clickID == 'sellers-tab'){
            $('.tab-pane').removeClass('active');
            $('.tab-pane').removeClass('show');
            $('.tab-pane').css('display', 'none');

            $('#sellers').addClass('active show'); 
            $('#sellers').css('display', 'block');
          
        }
        else if(clickID == 'featured-tab'){
            $('.tab-pane').removeClass('active');
             $('.tab-pane').removeClass('show');
             $('.tab-pane').css('display', 'none');

            $('#featured').addClass('active show'); 
            $('#featured').css('display', 'block'); 
        }
     
        
       
    }
}

export default ProductCarousel;