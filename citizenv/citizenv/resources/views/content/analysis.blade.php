<div id="phantichdanso" class="tabcontent">
                    <div class="formcontent">
                        <div class="container">
                            <div class="title">PHÂN TÍCH DÂN SỐ</div>
                            <div class="all-buttonchart">
                                <a href="#" class="active" onclick="openchart(event, 'chart-age')")>
                                    <div class="buttonchart-icon">
                                        <div><i class='bx bxs-bar-chart-alt-2' ></i></div>
                                        <div><p>Biểu đồ về tuổi</p></div>
                                    </div>   
                                </a>
                                <a href="#" onclick="openchart(event, 'chart-culture')">
                                    <div class="buttonchart-icon">
                                        <i class='bx bxs-pie-chart-alt-2'></i>
                                        <p>Trình độ học vấn</p>
                                    </div>   
                                </a>
                                <a href="#" onclick="openchart(event, 'chart-line')">
                                    <div class="buttonchart-icon">
                                        <i class='bx bx-line-chart' ></i>
                                        <p>Nghề nghiệp</p>
                                    </div>   
                                </a>
                                <a href="#" onclick="openchart(event, 'chart-combo')">
                                    <div class="buttonchart-icon">
                                        <i class='bx bxs-chart'></i>
                                        <p>Tỷ suất sinh </p>
                                    </div>   
                                </a>
                            </div>     
                        </div>
                    </div>

                    <div class="formcontent">
                        <div class="container">
                            <form action="#">
                                <div class="selectpeople">
                                    <div class="select-country nameselect">
                                        <p>Toàn quốc</p>
                                        <select>
                                            <option>- Chọn toàn quốc -</option>
                                        </select>
                                    </div>
                                    <div class="select-city nameselect">
                                        <p>Tỉnh/ TP</p>
                                        <select>
                                            <option>- Chọn tỉnh/ TP -</option>
                                            <option>Danh sách 01</option>
                                            <option>Danh sách 02</option>
                                            <option>Danh sách 03</option>
                                        </select>
                                    </div>
                                    <div class="select-district nameselect">
                                        <p>Quận/ huyện</p>
                                        <select>
                                            <option>- Chọn huyện -</option>
                                            <option>Danh sách 02</option>
                                            <option>Danh sách 03</option>
                                            <option>Danh sách 03</option>
                                        </select>
                                    </div>
                                    <div class="select-wards nameselect">
                                        <p>Phường/ Xã</p>
                                        <select>
                                            <option>- Chọn xã/ phường -</option>
                                            <option>Danh sách 02</option>
                                            <option>Danh sách 03</option>
                                            <option>Danh sách 03</option>
                                        </select>
                                    </div>
                                    <div class="select-village nameselect">
                                        <p>Thôn/ Xóm</p>
                                        <select>
                                            <option>- Chọn thôn/ xóm -</option>
                                            <option>Danh sách 02</option>
                                            <option>Danh sách 03</option>
                                            <option>Danh sách 03</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="button">
                                    <input type="submit" value="Xác Nhận">
                                </div>
                            </form>
                            <div class="chartpeople">
                                <div id="chart-age" class="chart-bar chart">
                                    <div class="chartbar">
                                        <canvas id="myChartbar1" width="200" height="200"></canvas>
                                        <div class="chart-note">
                                            <p>Biểu đồ dân số 2021 theo giới tính (đơn vị %)</p>
                                        </div>
                                    </div> 
                                    <div class="chartbar">
                                        <canvas id="myChartbar2" width="200" height="200"></canvas>
                                        <div class="chart-note">
                                            <p>Biểu đồ tuổi thọ trung bình</p>
                                        </div>
                                    </div> 
                                </div>
                                <div id="chart-culture" class="chart-pie chart">
                                    <div class="chartpie">
                                        <canvas id="myChartpie" width="200" height="200"></canvas>
                                        <div class="chart-note">
                                            <p>Biểu đồ trình độ học vấn (đơn vị %)</p>
                                        </div>
                                    </div>

                                </div>
                                <div id="chart-line" class="chartline chart">
                                    <canvas id="myChartline" width="200" height="200"></canvas>
                                </div>
                                <div id="chart-combo" class="chartcombo chart">
                                    <canvas id="myChartcombo" width="200" height="200"></canvas>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>