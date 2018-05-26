<script src="https://brainblocks.io/brainblocks.min.js"></script>
    <script>
    	var brainBlocksElements = document.querySelectorAll("[rel='brainblocks-button']");
    	if(brainBlocksElements.length > 0){
    		console.log(brainBlocksElements);
    		for (i = 0; i < brainBlocksElements.length; ++i) {
    			var brainBlocksElement = brainBlocksElements[i];
    			var brainBlocksButtonId = brainBlocksElement.dataset.id;
    			var brainBlocksButtonAmountRai = brainBlocksElement.dataset.amountRai;
    			var brainBlocksRenderer = brainblocks.Button.render({
		            payment: {
		                destination: "{{ config('brainblocks.receive-address') }}",
		                currency: 'rai',
		                amount: brainBlocksButtonAmountRai
		            },
		            onPayment: function (data) {
		                document.getElementById(brainBlocksButtonId+"-token").value = data.token;
		                document.getElementById(brainBlocksButtonId+"-form").submit();
		            }
		        }, '#'+brainBlocksButtonId+'-button');
    		}
    	}       
    </script>