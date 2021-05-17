<html>

<head>
	<title>Voting</title>
	<link rel="stylesheet" type="text/css" href="css/poll.css"/>
	<script language="javascript">
	     function setVote(voteName)
	     {
	      	document.getElementById("votefor").value = voteName;
	     }
	     function confirmSubmit() 
	     { 
		if (document.getElementById("votefor").value == "")
		{
		     var agree=confirm("Please select an entry before voting."); 
		     return false; 
		}
	     } 
	</script>
</head>

<body>
	<FORM id="frmVote" action="results.php" method="POST">
	     <table id="tblMain" align="center">
	       	<tr>
			<td class="header"></td>
	     	</tr>
		<tr>
			<td>
			     <?php
				include "loadpoll.php";
			     ?>
			</td>
		</tr>
		<tr>
			<td>
			     <input name="votefor" type="hidden"/>
			</td>
		</tr>
 		<tr>
			<td class="button">
			     <INPUT id="btnVote" onclick="return confirmSubmit()" type="submit" value="Vote"/>
			</td>
		</tr>
		<tr>
			<td class="footer">
			President for Universe
		      </td>
	     	</tr>
	     </table>
	</FORM>
</body>

</html>
