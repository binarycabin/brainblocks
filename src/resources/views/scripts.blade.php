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
                    var brainBlocksRenderer = brainblocks.Button.render({
                        payment: {
                            destination: brainBlocksButtonDestination,
                            currency: brainBlocksButtonCurrency,
                            amount: brainBlocksButtonAmount
                        },
                        onPayment: function (data) {
                            document.getElementById(brainBlocksButtonId + "-token").value = data.token;
                            document.getElementById(brainBlocksButtonId + "-form").submit();
                        }
                    }, '#' + brainBlocksButtonId + '-button');
                }
            }
        }
    </script>
