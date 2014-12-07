function point_in_poly(x, y, poly)
{
    var polySides = poly.length;
    var i;
    var j=poly.length-1;
    var oddNodes = false;

    for (i=0; i<polySides; i++)
    {
        if ((poly[i][1]< y && poly[j][1]>=y
        ||   poly[j][1]< y && poly[i][1]>=y)
        &&  (poly[i][0]<=x || poly[j][0]<=x))
        {
            oddNodes^=(poly[i][0]+(y-poly[i][1])/(poly[j][1]-poly[i][1])*(poly[j][0]-poly[i][0])<x);
        }
        j=i;
    }

    return oddNodes;
} 

function determine_neighbourhood(lat, lon)
{
    var foo = $.getJSON("boundaries.json", function(obj) {
        var ks = Object.keys(obj);
        for (i = 0; i < ks.length; i++)
        {
            way = obj[ks[i]];
            name = way[0];
            poly = way[1];
            if (point_in_poly(lat, lon, poly))
            {
                console.log(name + '[' + ks[i] + ']');
                $('#location .loc-name').html(name);
                $.getJSON("http://ec2-54-149-50-158.us-west-2.compute.amazonaws.com/index.php?action=getCrimeRating", function(obj) {
                    alert(obj);
                });
            }
        }
    });
}

function insertLocation(pos) {
    determine_neighbourhood(pos.coords.longitude, pos.coords.latitude);
}

// Update location on load
$(document).ready(function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(insertLocation);
    }
    
    $('#btn-taxi').bind('click', function() {
        $('#ifrm').attr('src', 'tel:416-829-4222');
    });
    
    $('#btn-bus').bind('click', function() {
        window.open('http://www.nextbus.com/');
    });
});