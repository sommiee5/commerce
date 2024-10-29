$(document).ready(function() {
    // Function to check if both fields are filled
    function checkFields() {
        var email = $("#email").val();
        var password = $("#password").val();
        
        // If both fields are filled, enable the button, otherwise disable it
        if (email !== "") {
            $("#loginbtn").removeAttr("disabled");
        } else {
            $("#loginbtn").attr("disabled", "disabled");
        }
    }

    // Attach event listeners to the input fields to check on keyup
    $("#email").on("keyup", function() {
        checkFields();
    });

    // Initial check on page load
    checkFields();
    
});

$(document).ready(function() {
    function signCheck() {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        
        // If both fields are filled, enable the button, otherwise disable it
        if (fname !== "") {
            $("#signbtn").removeAttr("disabled");
        } else {
            $("#signbtn").attr("disabled", "disabled");
        }
    }

    // Attach event listeners to the input fields to check on keyup
    $("#fname").on("keyup", function() {
        signCheck();
    });

    // Initial check on page load
    signCheck();

});

//i want to hover over image and see add to cart button
$(document).ready(function() {
    $(".femalepro").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})

$(document).ready(function() {
    $(".womens-cart").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})

$(document).ready(function() {
    $(".men-wear").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})

$(document).ready(function() {
    $(".pro-detail").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})

$(document).ready(function() {
    $(".accessdiv").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})



$(document).ready(function() {
    $(".mens-popular").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})

$(document).ready(function() {
    $("#teeshover").hover(
        function() {  
            // Mouse enters: change the image
            $(this).attr("src", "images/blacktees2.jpg");
        },
        function() {
            // Mouse leaves: revert to the original image
            $(this).attr("src", "images/blacktees1.jpg");
        }
    );

})

$(document).ready(function() {
    $(".tees").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})


$(document).ready(function() {
    $(".woman").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})



$(document).ready(function() {
    $(".top-tees").hover(function() {
        $(this).find(".add-to-cart-btn").show();
    }, function() {
        $(this).find(".add-to-cart-btn").hide();
    });
})


$(document).ready(function () {
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) { // Adjust this value as needed
            $('.navbar').addClass('bg-scrolled');
        } else {
            $('.navbar').removeClass('bg-scrolled');
        }
    });
});

$(document).ready(function() {
    let hoverTimeout;
  
    $('#menlink').hover(
      function() {
        clearTimeout(hoverTimeout); // Cancel hiding timeout if hovering over the link
        $('#offcanvasMen').offcanvas('show'); // Show the offcanvas immediately
      },
      function() {
        hoverTimeout = setTimeout(function() {
          $('#offcanvasMen').offcanvas('hide'); // Hide offcanvas after 200ms
        }, 2000); // Delay of 200 milliseconds
      }
    );
  
    $('#offcanvasMen').hover(
      function() {
        clearTimeout(hoverTimeout); // Cancel hiding timeout if hovering over the offcanvas
      },
      function() {
        hoverTimeout = setTimeout(function() {
          $('#offcanvasMen').offcanvas('hide'); // Hide offcanvas after 200ms
        }, 2000); // Delay of 200 milliseconds
      }
    );
  });

$(function(){
    $(".cartbtn").click((function(){
        var cval = $(this).val();
        $.post("add_to_cart.php", {id: cval}, function(response){
            if(response){
                location.reload();
            }
        });
    }));
    
});

$(document).ready(function() {
    $('#search-icon').click(function(e) {
        e.preventDefault(); // Prevent the default action of the link
        $('#nav-links').toggle(); // Toggle the visibility of the navigation links
        $('#search-container').toggle(); // Toggle the visibility of the search input container
        $('#search-input').focus(); // Focus on the input when it becomes visible
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('#search-icon, #search-container').length) {
            $('#search-container').hide(); // Hide the search input
            $('#nav-links').show(); // Show the navigation links again
        }
    });
}); 

$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        var searchTerm = $(this).val().trim(); // Get the search term

        if (searchTerm.length > 0) {
            // Send the search request to the server
            $.post('search.php', { search: searchTerm }, function(data) {
                // Clear previous search results
                $('#search-results').empty();

                // Convert the response data from JSON
                var products = JSON.parse(data);

                // Check if products were found
                if (products.length > 0) {
                    // Loop through products and add them to the results div
                    $.each(products, function(i, product) {
                        $('#search-results').append(`
                            <div>
                                <a href="product_detail.php?id=${product.products_id}">
                                    <img src="uploads/${product.products_image}" style="width: 50px;">
                                    ${product.products_name} - $${product.products_price}
                                </a>
                            </div>
                        `);
                    });
                } else {
                    // If no products found, show a message
                    $('#search-results').append('<div>No products found</div>');
                }
            });
        } else {
            // Clear the results if the search input is empty
            $('#search-results').empty();
        }
    });
});
