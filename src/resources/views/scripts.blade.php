<script src="https://brainblocks.io/brainblocks.min.js"></script>
    <script>
        if(window.attachEvent) {
            window.attachEvent('onload', processBrainBlocks);
        } else {
            if(window.onload) {
                var curronload = window.onload;
                var newonload = function(evt) {
                    curronload(evt);
                    processBrainBlocks(evt);
                };
                window.onload = newonload;
            } else {
                window.onload = processBrainBlocks;
            }
        }

        function processBrainBlocks() {
            var brainBlocksElements = document.querySelectorAll("[rel='brainblocks-button']");
            if (brainBlocksElements.length > 0) {
                console.log(brainBlocksElements);
                for (i = 0; i < brainBlocksElements.length; ++i) {
                    var brainBlocksElement = brainBlocksElements[i];
                    var brainBlocksButtonId = brainBlocksElement.dataset.id;
                    var brainBlocksButtonAmount = brainBlocksElement.dataset.amount;
                    var brainBlocksButtonDestination = brainBlocksElement.dataset.destination;
                    var brainBlocksButtonCurrency = brainBlocksElement.dataset.currency;
                    var brainBlocksButtonExpanded = brainBlocksElement.dataset.expanded;
                    var brainBlocksButtonSize = brainBlocksElement.dataset.size;
                    var brainBlocksRenderer = brainblocks.Button.render({
                        payment: {
                            destination: brainBlocksButtonDestination,
                            currency: brainBlocksButtonCurrency,
                            amount: brainBlocksButtonAmount
                        },
                        style: {
                            expanded: brainBlocksButtonExpanded,
                            size: brainBlocksButtonSize
                        },
                        onPayment: function (data) {
                            //throw a short delay before verifying to make sure payment is fulfilled
                            setTimeout(function(){
                                document.getElementById(brainBlocksButtonId+"-token").value = data.token;
                                document.getElementById(brainBlocksButtonId+"-form").submit();
                            }, 10000);
                        }
                    }, '#'+brainBlocksButtonId+'-button');
                }
            }
        }
    </script>
