
    <div class="mail">
        <div class="mail__container">
            <header class="mail__header">
                <p class="mail__header-title">Thanks for your order!</p>
            </header>
            <div class="mail__desc">
              <p>
                Cảm ơn bạn đã chọn sản phẩm của chúng tôi.Sau đây là thông tin đơn hàng của bạn
              </p>
            </div>
            <div class="mail__content">
                <div class="mail__content-status">
                    <div>
                        <span class="text-title">Mã đơn hàng:</span>
                        <span>{{$data['id']}}</span>
                    </div>
                    <div>
                        <span class="text-title">Người nhận:</span>
                        <span>{{$data['name']}}</span>
                    </div>
                    <div>
                        <span class="text-title">Địa chỉ:</span>
                        <span>{{$data['address']}}</span>
                    </div>
                    <div>
                        <span class="text-title">Ngày lập:</span>
                        <span>{{$data['created_at']}}</span>
                    </div>
                </div>
                    
                </div>
                <div class="mail__content-contact">
                    <p>If you have any questions, please send an email: <a href="#" class="mail-main">nonala8197@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>