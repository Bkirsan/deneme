import requests
import json
import time

def get_usd_to_try_exchange_rate():
    url = 'https://open.er-api.com/v6/latest/USD'
    
    try:
        response = requests.get(url)
        response.raise_for_status()  # İsteğin başarılı olup olmadığını kontrol et
        data = response.json()
        usd_to_try_rate = data['rates']['TRY']
        return usd_to_try_rate
    except requests.exceptions.RequestException as e:
        print(f'Hata oluştu: {e}')
        return None

def main():
    while True:
        usd_to_try_rate = get_usd_to_try_exchange_rate()

        if usd_to_try_rate is not None:
            print(f'Canlı USD/TRY Kuru: {usd_to_try_rate}')

        time.sleep(60)  # 60 saniye bekle, isteğe bağlı olarak değiştirilebilir

if __name__ == "__main__":
    main()
