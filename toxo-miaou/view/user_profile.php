<main class="row flex-grow-1 align-items-center justify-content-evenly gap-3 p-3">
            <div class="col" style="max-width: 40em;">
                <div class="d-flex flex-column align-items-center justify-content-between p-3 rounded rounded-3" id="photo_profil">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="bg-light border border-5 rounded-circle w-50 h-auto"
                            src="http://localhost:8090/toxo-miaou/assets/images/photos/Kit-Cat.webp" alt="Cat Profile">
                        <button type="button" class="btn-success rounded-circle border-3 border-light p-3" data-bs-toggle="modal" alt="Change user status" aria-label="search" data-bs-target="#profilModal"></button>
                    </div>
                    <h3 class="text-light">@Ultra_miaou999</h3>
                </div>
    
                <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">What's your status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="meow" checked>
                                    <label class="form-check-label border border-success border-3 rounded-pill bg-success text-light px-2" for="meow">
                                        Meow
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="scratchy">
                                    <label class="form-check-label border border-danger border-3 rounded-pill bg-danger text-light px-2" for="scratchy">
                                        Scrathy
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadio" id="ronron">
                                    <label class="form-check-label border border-secondary border-3 rounded-pill bg-secondary text-light px-2" for="ronron">
                                        Ronron
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
    
                <div id="profile_box" class="rounded rounded-3 p-3 d-flex flex-column justify-content-evenly">
                    <div class="d-flex">
                        <img src="http://localhost:8090/toxo-miaou/assets/images/icones/Id_cat.svg" alt="Id-Card" class="icon m-3">
                        <p class="underline pt-3">Chaussette</p>
                    </div>
                    <div class="d-flex">
                        <img src="http://localhost:8090/toxo-miaou/assets/images/icones/Mail.svg" alt="Mail" class="icon m-3">
                        <p class="underline pt-3">ultra_miaou999@catmail.com</p>
                    </div>
                    <div class="d-flex">
                        <img src="http://localhost:8090/toxo-miaou/assets/images/icones/Phone.svg" alt="Phone" class="icon m-3">
                        <p class="underline pt-3">+33 4 50 27 58 94</p>
                    </div>
                    <div class="d-flex">
                        <img src="http://localhost:8090/toxo-miaou/assets/images/icones/Cat_house.svg" alt="Address" class="icon m-3">
                        <p class="underline pt-3">446 White Oak Drive, 64110, Overlord</p>
                    </div>
                </div>   
            </div>

            <div class="col d-flex flex-column gap-3" style="max-width: 40em;">
                <div class="border rounded rounded-3 bg-light p-3">
                    <h3>Bio</h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type...
                    </p>
                </div>
    
                <div class="d-flex gap-3 flex-column align-items-center justify-content-evenly p-5">
                        
                    <button type="button" class="btn bg-warning" style="width: 15em;">Purchases</button>
                
                    <button type="button" class="btn bg-warning" style="width: 15em;">Favorites</button>
                
                    <button type="button" class="btn bg-warning" style="width: 15em;">Payment Method</button>
                </div>    
            </div>
    </main>