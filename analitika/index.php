<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Аналитика - раздел в разработке");
?> <br><br><br>

            <div class="analit">
                <div class="analit__header">
                    <a class="active">Сегодня</a>
                    <a href="">Вчера</a>
                    <a href="">Неделя</a>
                    <a href="">Месяц</a>
                    <a href="">Квартал</a>
                    <a href="">Год</a>
                    <input class="datapicker" value="13 янв - 15 фев" data-date-format="dd M" data-range="true" data-multiple-dates-separator=" - " data-position='bottom right' />
                </div>
                <div class="analit__row">
                    <div class="analit__col">
                        <div class="analit__item">
                            <div class="analit__title">
                                Клики по кнопке
                                <a href="" download="">

                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"/>
                                    </svg>
                                </a>
                            </div>
                            <div id="click-charts">

                            </div>
                        </div>
                    </div>
                    <div class="analit__col">
                        <div class="analit__conversia">
                            <div class="analit__item">
                                <div class="analit__title">
                                    Конверсия в канал продаж
                                    <a href="" download="">

                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="conv__wrap">
                                    <div class="left">
                                        <div class="conv__procent">
                                            32,7%
                                        </div>
                                        <div class="conv__line">
                                            Посещений сайта
                                            <span>2500</span>
                                        </div>
                                        <div class="conv__line">
                                            Переходов в МП
                                            <span>600</span>
                                        </div>
                                    </div>
                                    <div class="right" id="conv1"></div>
                                </div>
                            </div>
                            <div class="analit__item">
                                <div class="analit__title">
                                    Конверсия в канал продаж
                                    <a href="" download="">

                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="conv__wrap">
                                    <div class="left">
                                        <div class="conv__procent">
                                            32,7%
                                        </div>
                                        <div class="conv__line">
                                            Посещений сайта
                                            <span>2500</span>
                                        </div>
                                        <div class="conv__line">
                                            Переходов в МП
                                            <span>600</span>
                                        </div>
                                    </div>
                                    <div class="right" id="conv2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="analit__row">
                    <div class="analit__col">
                        <div class="analit__item">
                            <div class="analit__title">
                                Переходы по ссылкам
                                <a href="" download="">

                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="change__type">
                                <a href="">проценты</a>
                                <a class="active">штуки</a>
                            </div>
                            <div class="chatrt__round-wrap">
                                <div class="left">

                                    <div class="perehod-line first">
                                        Wildberries
                                        <span>30%</span>
                                    </div>
                                    <div class="perehod-line two">
                                        OZON
                                        <span>30%</span>
                                    </div>
                                    <div class="perehod-line three">
                                        Яндекс.Маркет
                                        <span>30%</span>
                                    </div>
                                    <div class="perehod-line four">
                                        Goods
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="right">
                                    <div id="round1" class="round"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="analit__col">
                        <div class="analit__item item-right">
                            <div class="analit__title">
                                Переходы по ссылкам
                                <a href="" download="">

                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="change__type">
                                <a href="">UTM-метки</a>
                            </div>
                            <div class="chatrt__round-wrap">
                                <div class="left">
                                    <div id="round2" class="round"></div>
                                </div>
                                <div class="right">
                                    <div class="perehod-line first">
                                        Wildberries
                                        <span>33%</span>
                                    </div>
                                    <div class="perehod-line two">
                                        OZON
                                        <span>33%</span>
                                    </div>
                                    <div class="perehod-line three">
                                        Яндекс.Маркет
                                        <span>33%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="analit__table">
                    <div class="analit__title">
                        <div class="analitic-search">
                        Клики по товарам
                        <form class="catalog__search">
                            <button>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.07 14.83L17 12.71C16.5547 12.2868 15.9931 12.0063 15.3872 11.9047C14.7813 11.8032 14.1589 11.8851 13.6 12.14L12.7 11.24C13.7605 9.82292 14.2449 8.05668 14.0555 6.29684C13.8662 4.537 13.0172 2.91423 11.6794 1.7552C10.3417 0.596178 8.61452 -0.0130406 6.84565 0.0501869C5.07678 0.113414 3.39754 0.844393 2.14596 2.09597C0.894381 3.34755 0.163402 5.0268 0.100175 6.79567C0.0369472 8.56454 0.646165 10.2917 1.80519 11.6294C2.96421 12.9672 4.58699 13.8162 6.34683 14.0055C8.10667 14.1949 9.87291 13.7106 11.29 12.65L12.18 13.54C11.8951 14.0996 11.793 14.7346 11.8881 15.3553C11.9831 15.9761 12.2706 16.5513 12.71 17L14.83 19.12C15.3925 19.6818 16.155 19.9974 16.95 19.9974C17.745 19.9974 18.5075 19.6818 19.07 19.12C19.3557 18.8406 19.5828 18.5069 19.7378 18.1386C19.8928 17.7702 19.9726 17.3746 19.9726 16.975C19.9726 16.5754 19.8928 16.1798 19.7378 15.8114C19.5828 15.4431 19.3557 15.1094 19.07 14.83ZM10.59 10.59C9.89023 11.288 8.99929 11.7629 8.02973 11.9549C7.06017 12.1468 6.05549 12.047 5.14259 11.6682C4.2297 11.2894 3.44955 10.6485 2.9007 9.82654C2.35185 9.00457 2.05893 8.03837 2.05893 7.05C2.05893 6.06163 2.35185 5.09544 2.9007 4.27347C3.44955 3.45149 4.2297 2.81062 5.14259 2.43182C6.05549 2.05301 7.06017 1.95325 8.02973 2.14515C8.99929 2.33706 9.89023 2.812 10.59 3.51C11.0556 3.97446 11.4251 4.52621 11.6771 5.13367C11.9292 5.74112 12.0589 6.39233 12.0589 7.05C12.0589 7.70768 11.9292 8.35889 11.6771 8.96634C11.4251 9.57379 11.0556 10.1255 10.59 10.59ZM17.66 17.66C17.567 17.7537 17.4564 17.8281 17.3346 17.8789C17.2127 17.9297 17.082 17.9558 16.95 17.9558C16.818 17.9558 16.6873 17.9297 16.5654 17.8789C16.4436 17.8281 16.333 17.7537 16.24 17.66L14.12 15.54C14.0263 15.447 13.9519 15.3364 13.9011 15.2146C13.8503 15.0927 13.8242 14.962 13.8242 14.83C13.8242 14.698 13.8503 14.5673 13.9011 14.4454C13.9519 14.3236 14.0263 14.213 14.12 14.12C14.213 14.0263 14.3236 13.9519 14.4454 13.9011C14.5673 13.8503 14.698 13.8242 14.83 13.8242C14.962 13.8242 15.0927 13.8503 15.2146 13.9011C15.3364 13.9519 15.447 14.0263 15.54 14.12L17.66 16.24C17.7537 16.333 17.8281 16.4436 17.8789 16.5654C17.9296 16.6873 17.9558 16.818 17.9558 16.95C17.9558 17.082 17.9296 17.2127 17.8789 17.3346C17.8281 17.4564 17.7537 17.567 17.66 17.66Z" fill="#383838"></path>
                                    </svg>                                
                            </button>
                            <input type="text" placeholder="Поиск товара">
                        </form>
                        </div>
                        <a href="" download="">

                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.29 13.71C9.3851 13.801 9.49725 13.8724 9.62 13.92C9.86346 14.02 10.1365 14.02 10.38 13.92C10.5028 13.8724 10.6149 13.801 10.71 13.71L13.71 10.71C13.8983 10.5217 14.0041 10.2663 14.0041 10C14.0041 9.7337 13.8983 9.47831 13.71 9.29C13.5217 9.1017 13.2663 8.99591 13 8.99591C12.7337 8.99591 12.4783 9.1017 12.29 9.29L11 10.59V7C11 6.73479 10.8946 6.48043 10.7071 6.2929C10.5196 6.10536 10.2652 6 10 6C9.73478 6 9.48043 6.10536 9.29289 6.2929C9.10536 6.48043 9 6.73479 9 7V10.59L7.71 9.29C7.61704 9.19628 7.50644 9.12188 7.38458 9.07111C7.26272 9.02034 7.13201 8.99421 7 8.99421C6.86799 8.99421 6.73728 9.02034 6.61542 9.07111C6.49356 9.12188 6.38296 9.19628 6.29 9.29C6.19627 9.38297 6.12188 9.49357 6.07111 9.61543C6.02034 9.73729 5.9942 9.86799 5.9942 10C5.9942 10.132 6.02034 10.2627 6.07111 10.3846C6.12188 10.5064 6.19627 10.617 6.29 10.71L9.29 13.71ZM10 20C11.9778 20 13.9112 19.4135 15.5557 18.3147C17.2002 17.2159 18.4819 15.6541 19.2388 13.8268C19.9957 11.9996 20.1937 9.98891 19.8079 8.0491C19.422 6.10929 18.4696 4.32746 17.0711 2.92894C15.6725 1.53041 13.8907 0.578004 11.9509 0.192152C10.0111 -0.193701 8.00043 0.00433284 6.17317 0.761209C4.3459 1.51809 2.78412 2.79981 1.6853 4.4443C0.58649 6.08879 0 8.02219 0 10C0 12.6522 1.05357 15.1957 2.92893 17.0711C3.85752 17.9997 4.95991 18.7363 6.17317 19.2388C7.38642 19.7413 8.68678 20 10 20ZM10 2C11.5823 2 13.129 2.4692 14.4446 3.34825C15.7602 4.2273 16.7855 5.47673 17.391 6.93854C17.9965 8.40035 18.155 10.0089 17.8463 11.5607C17.5376 13.1126 16.7757 14.538 15.6569 15.6569C14.538 16.7757 13.1126 17.5376 11.5607 17.8463C10.0089 18.155 8.40034 17.9965 6.93853 17.391C5.47672 16.7855 4.22729 15.7602 3.34824 14.4446C2.46919 13.129 2 11.5823 2 10C2 7.87827 2.84285 5.84344 4.34315 4.34315C5.84344 2.84286 7.87827 2 10 2Z" fill="#FF6767"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="analit__table__wrap">
                        <table>
                            <thead>
                                <tr>
                                    <td class="url">
                                        Название
                                    </td>
                                    <td class="url">
                                        URL товара
                                    </td>
                                    <td class="name-mark">OZON <span>↓</span></td>
                                    <td class="name-mark">Wildberries <span>↓</span></td>
                                    <td class="name-mark">Goods <span>↓</span></td>
                                    <td class="name-mark">Я.М <span>↓</span></td>
                                    <td class="name-mark">Сумма <span>↓</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="url">
                                        персиковые бомбы
                                    </td>
                                    <td class="url">
                                        https://kkproject.ru/product/item-509/
                                    </td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td class="sum">15</td>
                                </tr>
                                <tr>
                                    <td class="url">
                                        персиковые бомбы
                                    </td>
                                    <td class="url">
                                        https://kkproject.ru/product/item-509/
                                    </td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td class="sum">15</td>
                                </tr>
                                <tr>
                                    <td class="url">
                                        персиковые бомбы
                                    </td>
                                    <td class="url">
                                        https://kkproject.ru/product/item-509/
                                    </td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td class="sum">15</td>
                                </tr>
                                <tr>
                                    <td class="url">
                                        персиковые бомбы
                                    </td>
                                    <td class="url">
                                        https://kkproject.ru/product/item-509/
                                    </td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td class="sum">15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>