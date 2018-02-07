<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Oria
 */
?>

		</div>
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	// List Student
	var dataDays = document.getElementsByClassName('data_days');
	if ( dataDays != undefined ) {
		dataDays = [].slice.call(dataDays);
		dataDays.forEach( function(e) {
		    dataArray = e.textContent.split(',')
		    dataArray = dataArray.map(e => e.trim())
		    stringDay(e.getAttribute('data-day-name'), dataArray)
		});
		function createLi(pr, pr_name) {
		    if ( pr === "1" ) {
		        var textnode = '<i class="fa fa-star"></i>';
		    } else {
		        var textnode = '<i class="fa fa-star-o"></i></li>';
		    }
		    var node = document.createElement("LI");
		    node.innerHTML = textnode;
		    document.getElementById(pr_name).appendChild(node)
		}
		function stringDay(pr_name, pr_ar) {
		    var num = 0;
		    pr_ar.forEach( function(e) {
		        createLi(e, pr_name)
		        if ( e === "1" ) { num = num + 1; }
		    });
		    var progess = document.getElementById(pr_name).nextElementSibling.querySelectorAll('.progress-bar')[0]
		    progess.style.width = num*100/16 + '%';
		    var node = document.createElement("SPAN");
		    node.innerHTML = num + '/16';
		    progess.appendChild(node)
		}
	}

	// HopAm list images
	var HopAm = Note_Group.textContent;
	function getHopAm() {
		var HopAm = Note_Group.textContent;
		HopAm = HopAm.split(',');
		HopAm = HopAm.map(e => e.trim())
		return HopAm;
	}
	function fnGetSub() {
		var getSub = document.querySelectorAll('.sub-q');
		getSub.forEach( function(e){
			e.onmouseover = function() {
				if ( HopAm.includes(e.textContent) && e.querySelectorAll('.sub-img')[0] === undefined) {
					e.appendChild(appendTuds(e.textContent))
					setTimeout( function() {
						e.setAttribute('class', 'sub-q hover');
					}, 10);
					e.querySelectorAll('.sub-img img')[0].onload = function() {
						var a = this.parentElement.parentElement;
						setTimeout( function() {
							a.setAttribute('class', 'sub-q hover loading-done');
						}, 10);
					}
				}
			}
		});
	}
	if ( HopAm != undefined ) {
		// var ArraySub;
		var insertdiv = document.createElement('div');
		insertdiv.className   = 'head-music';
		insertdiv.innerHTML = '<button class="btn" id="pre_tuds">Tăng tong</button><span class="sub-q"></span><button class="btn" id="next_tuds">Giảm tong</button>';
		var el = document.getElementById('Note_Group');
		el.parentElement.insertBefore(insertdiv, el.nextSibling)

		HopAm = getHopAm();
		document.getElementsByClassName('sub-q')[0].innerHTML = HopAm[0]

		function changeNote(num, note_first, note_last) {
			var getNote = document.getElementsByClassName('sub-q');
			getNote = [].slice.call(getNote);
			getNote.forEach( function(e) {
				if ( HopAm.includes(e.textContent) && e.textContent != note_last ) {
					e.innerHTML = HopAm[HopAm.indexOf(e.textContent) + num];
				} else {
					e.innerHTML = note_first
				}
			});
		}

		next_tuds.onclick = function() {
			changeNote(+1, HopAm[0], HopAm[HopAm.length-1]);
		}
		pre_tuds.onclick = function() {
			changeNote(-1, HopAm[HopAm.length-1], HopAm[0]);
		}
		
		function appendTuds(img_name) {
			var node = document.createElement('div')
			node.setAttribute('class', 'sub-img');
			node.innerHTML = '<img src="https://quynhlemo.com/wp-content/uploads/note/' + img_name + '.jpg">' ;
			return node;
		}
		// Call function getSub
		fnGetSub();
	}
</script>

</body>
</html>
