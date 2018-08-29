//Example API URL # https://docs.firstpromoter.com/

curl -X POST "https://firstpromoter.com/api/v1/track/sale"
  -d "wid=b850ac4wer56hy1b5ef41"
  -d "email=shelley@example.com"
  -d "uid=cbdemo_shelley"
  -d "event_id=9856044"
  -d "plan=monthly-starter"
  -d "amount=6000"
  -H "x-api-key: 2947d4543695e7cc7dhda3c52ebyt74eb8"

//API Response

{
  "id": 1708,
  "type": "sale",
  "amount_cents": 6000,
  "lead": {
    "id": 943,
    "state": "active",
    "email": "shelley@example.com",
    "uid": "cbdemo_shelley",
    "customer_since": "2018-04-11T14:54:32.014Z",
    "plan_name": "monthly-starter",
    "suspicion": "no_suspicion"
  },
  "promoter": {
    "id": 1983,
    "cust_id": null,
    "email": "test@test.com",
    "temp_password": "u1PptB",
    "default_promotion_id": 1986,
    "default_ref_id": "test_ref_id",
    "earnings_balance": {
      "cash": 1200
    },
    "current_balance": {
      "cash": 1200
    },
    "paid_balance": null
  }
}
