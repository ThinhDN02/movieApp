package com.example.chitietphim;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.example.chitietphim.Adapter.MovieAdapter;
import com.example.chitietphim.Model.MovieItem;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class MovieTheLoaiActivity extends AppCompatActivity {

    private RecyclerView recyclerViewtl;
    private MovieAdapter movieAdaptertl;
    private List<MovieItem> movieItemstl;
    private TextView tv_theloai;

    String urlGetDataTL = "http://172.17.21.45:8080/service/datamovietheloai.php";

    String idtl="";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_theloai);
        setTitle("Tìm theo thể loại");
        recyclerViewtl = findViewById(R.id.rcv_list_movie_theloai);
        tv_theloai = findViewById(R.id.tv_nam);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this, RecyclerView.VERTICAL, false);
        recyclerViewtl.setLayoutManager(linearLayoutManager);

        movieItemstl =new ArrayList<>();


        Intent intent = getIntent();
        if (intent != null) {
            String idmovie = intent.getStringExtra("movieid");
            idtl = idmovie;
            switch (idmovie) {
                case "TL01":
                    tv_theloai.setText("Thể loại phim kinh dị");
                    break;
                case "TL02":
                    tv_theloai.setText("Thể loại phim hành động");
                    break;
                case "TL03":
                    tv_theloai.setText("Thể loại phim tình cảm");
                    break;
                default:
                    tv_theloai.setText("Thể loại phim hoạt hình");
                    break;
            }
            GetData(urlGetDataTL,idtl);
        }
    }
    private void GetData(String url,String ma){
        url+="?maTheLoai="+ma;
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                for (int i = 0; i < response.length(); i++) {
                    try {
                        JSONObject object = response.getJSONObject(i);
                        movieItemstl.add(new MovieItem(
                                object.getString("maPhim"),
                                object.getString("tenPhim"),
                                object.getString("soDiemPhim"),
                                object.getString("anhBia")
                        ));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    movieAdaptertl = new MovieAdapter(MovieTheLoaiActivity.this, movieItemstl);
                    recyclerViewtl.setAdapter(movieAdaptertl);
                }

            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(MovieTheLoaiActivity.this, "Lỗi!" + error.toString(), Toast.LENGTH_LONG).show();
                    }
                }
        );
        requestQueue.add(jsonArrayRequest);
    }
}