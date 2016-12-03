// Step 1
function create_markers_from_view(result)
{
	stat=false;
	var obj=$.parseJSON(result);
	var len=obj.length;
	var i=0;
	while(i<len)
	{
		var lat=obj[i].lat;
		var lon=obj[i].lon;
		var status="";
		status=space_status(obj[i].is_occupied,obj[i].is_reserved);
		var google_latlon= new google.maps.LatLng(lat,lon);
		var nmarker = new google.maps.Marker(
		{
			position: google_latlon,
			title: "Here you live!",
			icon: status,
			id: obj[i].space_id
		});
		newmarkers.push(nmarker);
		i++;
	}
}







// Step 2
function remaining_ping()
{

			// For the first time oldmarkers is 0
			// This runs for the first time
			if(oldmarkers.length<=0)
			{
				for(b=0;b<newmarkers.length;b++)
				{
					newmarkers[b].setMap(map);
					if(newmarkers[b].icon=="vacant.png"){
					google.maps.event.addListener(newmarkers[b],'click',function(){showmodal(this);});
					}
				}
				oldmarkers=newmarkers;
				newmarkers=[];
			}

			// For rest of the loop oldmarkers will have some objects
			// This is when comparision needed
			// else if
			else if(oldmarkers.length>0)
			{
			var rm_ind=[];
			var map_rm_ind=[];
				for(q=0;q<oldmarkers.length;q++)
				{
					stat=false;
					for(w=0;w<newmarkers.length;w++)
					{
						var chk=oldmarkers[q].getPosition().equals(newmarkers[w].getPosition());
						stat |=chk;
						if(chk)
						{
							oldmarkers[q].setIcon(newmarkers[w].icon);
							// Save these indices in array to remove at end of the loop
							rm_ind.push(w);
						}

					}
					if(stat==false | stat==0)
					{
					// Store the indices to remove them from map
					map_rm_ind.push(q);
					}
				}
				//remove obsolete markers from map
				console.log("This is map remove index" + map_rm_ind);
				if(map_rm_ind.length>0)
				for(u=0;u<map_rm_ind.length;u++)
				{
					oldmarkers[map_rm_ind[u]].setMap(null);
					oldmarkers[map_rm_ind[u]]=null;
					oldmarkers.splice(map_rm_ind[u],1);
				}
				map_rm_ind=[];
				// remove existing markers from newmarkers
				for(f=0;f<rm_ind.length;f++)
				{
					newmarkers.splice(rm_ind[f],1);
				}
				rm_ind=[];
				for(r=0;r<newmarkers.length;r++)
				{
					newmarkers[r].setMap(map);
					if(newmarkers[r].icon=="vacant.png"){
					google.maps.event.addListener(newmarkers[r],'click',function(){showmodal();});
					}
				}
				oldmarkers=oldmarkers.concat(newmarkers);
				newmarkers=[];
			}

	}
